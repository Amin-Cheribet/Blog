<?php

namespace Controller;

use Controller\Controller as Controller;
use Request\Request as Request;
use Authenticator\Auth as Auth;
use Model\Comment as Comments;

class Comment extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            throw new \Exception('Action not allowed', 1);
        }
        $request->validate('comment', 'Comment')->required()->length(3, 60);
        if (!$request->isValide()) {
            echo json_encode($request->getErrors());
            return false;
        }
        Comments::insert([
            'id'      => uniqid(),
            'user'    => Auth::user()->id,
            'post'    => $request->post,
            'comment' => $request->comment,
        ])->save();
        echo 1;
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
