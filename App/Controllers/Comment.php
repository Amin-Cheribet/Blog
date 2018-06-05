<?php

namespace Controller;

use Controller\Controller as Controller;
use Request\Request as Request;

class Comment extends Controller
{

    public function store(Request $request)
    {
        if (!Auth::check()) {
            throw new \Exception('Action not allowed', 1);
        }
        $request->validate('comment', 'Comment')->required()->length(3, 60);
        if (!empty($request->getErrors())) {
            return $request->getErrors();
        }
        Comments::insert([
            'id'      => uniqid(),
            'user'    => Auth::user()->id,
            'post'    => $request->post,
            'comment' => $request->comment,
        ])->save();
        return true;
    }

    public function delete(Request $request, string $id)
    {
        if (!Auth::check(['auth' => 3])) {
            throw new \Exception("Your not allowed to do this", 1);
        }
        Comments::delete()->where('id', '=', $id)->save();
    }
}
