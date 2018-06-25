<?php

namespace Controller;

use Controller\Controller as Controller;
use Request\Request as Request;
use Upload\Upload as Upload;

class Admin extends Controller
{
    public function index()
    {
        $this->postsList();
    }

    public function postsList()
    {
        $data = \Model\Post::select()->get();
        view('admin/posts', ['posts' => $data]);
    }

    public function usersList()
    {
        $data = \Model\User::select()->get();
        view('admin/users', ['users' => $data]);
    }

    public function showConfiguration()
    {
        $data = file_get_contents(rootDir().'/config.json');
        view('admin/configuration', ['data' => json_decode($data)]);
    }

    public function updateConfiguration(Request $request)
    {
        $coverImage = new Upload('coverimage');
        $coverImage = $coverImage->save('Storage');

        $data = [
            'languages'  => $request->languages,
            'comments'   => $request->comments,
            'visits'     => $request->visits,
            'coverImage' => $coverImage[0]->path,
        ];
        if (!file_put_contents(rootDir().'/config.json', json_encode($data))) {
            throw new \Exception("Faild to update configuration", 1);
        }
        route('admin/configuration');
    }

    public function statistics()
    {
        $hits = \Model\StatisticsHits::select()->count();
        $unique = \Model\StatisticsUniq::select()->count();
        return view('admin/statistics', ['hits' => $hits, 'unique' => $unique]);
    }
}
