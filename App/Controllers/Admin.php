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
        view('admin/configuration', ['data' => $this->getConfiguration()]);
    }

    public function updateConfiguration(Request $request)
    {
        $request->validate('name', 'Blog Name')->required();
        $request->validate('languages', 'Languages')->required();
        $request->validate('comments', 'Comments')->required();
        $request->validate('visits', 'Visits visibility')->required();

        if (!empty($request->getErrors())) {
            return view('admin/configuration', ['data' => $this->getConfiguration(), 'errors' => $request->getErrors()]);
        }
        $configuration = $this->getConfiguration();
        $data = [
            'name'      => $request->name,
            'languages' => $request->languages,
            'comments'  => $request->comments,
            'visits'    => $request->visits,
            'seo'       => $request->seo,
        ];
        $data['coverImage'] = $configuration->coverImage;

        $this->updateConfigurationFile($data);

        route('admin/configuration');
    }

    public function updateCoverImage(Request $request)
    {
        $coverImage = new Upload('coverimage');
        $coverImage->validate()->number(1)->extension(['png','jpg','jpeg']);

        if (!empty($coverImage->getErrors())) {
            return view('admin/configuration', ['data' => $this->getConfiguration(),'uploadErrors' => $coverImage->getErrors()]);
        }

        $coverImage = $coverImage->save('./Storage');

        $configuration = $this->getConfiguration(true);
        $configuration['coverImage'] = $coverImage->path;
        $this->updateConfigurationFile($configuration);

        return view('admin/configuration', ['data' => $this->getConfiguration()]);
    }

    private function getConfiguration($flag = false)
    {
        $json = file_get_contents(rootDir().'config.json');
        return json_decode($json, $flag);
    }

    private function updateConfigurationFile(array $data)
    {
        if (!file_put_contents(rootDir().'/config.json', json_encode($data))) {
            throw new \Exception("Faild to update configuration", 1);
        }
    }

    public function statistics()
    {
        $hits = \Model\StatisticsHits::select()->count();
        $unique = \Model\StatisticsUniq::select()->count();
        return view('admin/statistics', ['hits' => $hits, 'unique' => $unique]);
    }
}
