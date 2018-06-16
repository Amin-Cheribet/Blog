<?php

namespace Controller;

use Controller\Controller as Controller;
use Request\Request as Request;
use Model\Post as Posts;
use Model\Comment as Comments;
use Upload\Upload as Upload;
use Authenticator\Auth as Auth;

class Post extends Controller
{
    public function grid(int $offset = 0, int $number = 12)
    {
        $data = Posts::leftJoin('images', 'gridimage', 'id')->where('language', '=', language())->limit($offset, $number)->get();
        view('post/grid', ['posts' => $data]);
    }

    public function create()
    {
        view('post/create');
    }

    public function store(Request $request)
    {
        $request->validate('title', 'Title')->required()->length(3, 20);
        $request->validate('description', 'Description')->length(3, 50);
        $request->validate('language', 'Language');
        $request->validate('post', 'Post text')->required()->length(100, 99999);
        $errors     = $request->getErrors();
        $coverImage = new Upload('cover-image');
        $gridImage  = new Upload('grid-image');
        // validate uploaded images
        $coverImage->validate()->extension(['jpg', 'jpeg', 'gif', 'png'])->size(0, 3)->number(1);
        $gridImage->validate()->extension(['jpg', 'jpeg', 'gif', 'png'])->size(0, 3)->number(1);
        if (!empty($coverImage->getErrors())) {
            $errors = array_merge($errors, $coverImage->getErrors());
        }
        if (!empty($gridImage->getErrors())) {
            $errors = array_merge($errors, $gridImage->getErrors());
        }

        if (empty($errors)) {
            $id = uniqid();
            $groupid = uniqid();
            $language = (!$request->language) ? 'en' : $request->language;
            $coverData = $coverImage->save('Storage');
            $gridData = $gridImage->save('Storage');
            $this->saveImage($coverData);
            $this->saveImage($gridData);
            Posts::insert([
                'id'          => $id,
                'postgroup'   => $groupid,
                'title'       => $request->title,
                'description' => $request->description,
                'writer'      => Auth::user()->id,
                'language'    => $language,
                'post'        => $request->post,
                'coverimage'  => $coverData[0]->id,
                'gridimage'   => $gridData[0]->id,
            ])->save();
            redirect('post/'.$id);
        }
        view('post/create', ['errors' => $errors]);
    }

    private function saveImage(array $images)
    {
        foreach ($images as $image) {
            \Model\Image::insert([
                'id'   => $image->id,
                'name' => $image->name,
                'path' => $image->path,
            ])->save();
        }
    }

    public function show(string $id)
    {
        $post = Posts::leftJoin('images', 'coverimage', 'id')->where('language', '=', language())->first();
        if (is_null($post)) {
            throw new \Exception("This Post does not exist", 404);
        }
        $comments = Comments::leftJoin('Users', 'user', 'id')->where('comments.post', '=', $id)->get();
        view('post/show', ['post' => $post, 'comments' => $comments]);
    }

    public function edit(string $id)
    {
        $data = Posts::select()->where('id', '=', $id)->first();
        view('post/edit', ['id' => $data->id, 'post' => $data]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate('title', 'Title')->required()->length(3, 20);
        $request->validate('language', 'Language')->length(2, 15);
        $request->validate('description', 'Description')->length(3, 50);
        $request->validate('post', 'Post Text')->required()->length(50, 99999);
        $errors  = $request->getErrors();
        $coverImage = new Upload('cover-image');
        $gridImage  = new Upload('grid-image');
        if ($coverImage->exist()) {
            $coverImage->validate()->extension(['jpg', 'jpeg', 'gif', 'png'])->size(0, 3)->number(1);
            $errors = array_merge($errors, $coverImage->getErrors());
        }
        if ($gridImage->exist()) {
            $gridImage->validate()->extension(['jpg', 'jpeg', 'gif', 'png'])->size(0, 3)->number(1);
            $errors = array_merge($errors, $gridImage->getErrors());
        }
        if (empty($errors)) {
            $updateData = [
                'title'       => $request->title,
                'description' => $request->description,
                'language'    => $request->language,
                'post'        => $request->post,
            ];
            if ($coverImage->exist()) {
                $coverData = $coverImage->save('Storage');
                $updateData = array_merge($updateData, ['coverimage' => $coverData[0]->id]);
                $this->saveImage($coverData);
            }
            if ($gridImage->exist()) {
                $gridData = $gridImage->save('Storage');
                $updateData = array_merge($updateData, ['gridimage' => $gridData[0]->id]);
                $this->saveImage($gridData);
            }
            Posts::update($updateData)
            ->where('id', '=', $id)
            ->save();
            return route('post/'.$id.'/edit');
        }
        view("post/edit", ['id' => $id, 'post' => $request, 'errors' => $errors]);
    }

    public function delete(string $id)
    {
        Posts::delete()->where('id', '=', $id)->save();
        return true;
    }
}
