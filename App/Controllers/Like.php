<?php

namespace Controller;

use Controller\Controller as Controller;
use Request\Request as Request;

class Like extends Controller
{

    public function store(Request $request)
    {
        if (!Auth::check()) {
            throw new \Exception("Action not allowed", 1);
        }
        $like = Likes::select()->where('id', '=', Auth::user()->id)->get();
        if (empty($like)) {
            Likes::insert([
                'id'   => uniqid(),
                'user' => Auth::user()->id,
                'post' => $request->post,
            ])->save();
            return true;
        }
        return false;
    }
}
