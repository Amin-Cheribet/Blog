<?php

namespace Controller;

use Controller\Controller as Controller;
use Request\Request as Request;
use Model\User as Users;
use Authenticator\Auth as Auth;

class User extends Controller
{

    public function index(string $offset)
    {
        $data = Users::select()->limit($offset, 30)->get();
        view('user/index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate('name', 'Name')->required()->length(4, 15)->unique('user', 'name');
        $request->validate('email', 'E-mail')->required()->email()->length(4,100)->unique('user', 'email');
        $request->validate('password', 'Password')->required()->length(6, 30)->equals('confirm-password', $request->password2);
        if (!empty($request->getErrors())) {
            echo json_encode($request->getErrors());
            return false;
        }
        Users::insert([
            'id'       => uniqid(),
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Auth::hash($request->password),
            'banned'   => 0,
            'auth'     => 1,
        ])
        ->save();
        echo '1';
        return true;
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['User', 'email' => $request->email, 'password' => $request->password])) {
            echo '1';
            return true;
        }
        echo '- E-mail or password is wrong';
        return false;
    }

    public function edit(string $id)
    {
        if (!Auth::check(['id' => $id])) {
            throw new \Exception("Not allowed action", 99);
        }
        $data = Users::select()->where('id', '=', $id)->first();
        if (empty($data)) {
            throw new \Exception(["This page does not exist"], 1);
        }
        view('user/edit', ['data' => $data]);
    }

    public function update(Request $request, string $id)
    {
        if (!Auth::check(['id' => $id])) {
            throw new \Exception("Not allowed action", 98);
        }
        $request->validate('name', 'Name')->required()->length(4, 15);
        $request->validate('email', 'E-mail')->required()->email()->length(4,100);
        $request->validate('password', 'Password')->required()->length(6, 30)->equals('Confirm-password', $request->password2);
        if ($request->isValide()) {
            Users::update([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Auth::hash($request->password),
            ])
            ->where('id', '=', $id)
            ->save();
        }
        $data = Users::select()->where('id', '=', $id)->first();
        view('user/edit', ['data' => $data, 'errors' => $request->getErrors()]);
    }

    public function delete(Request $request, string $id)
    {
        if (!Auth::check(['id' => $id])) {
            throw new \Exception("Not autorized", 1);
        }

        Users::delete()->where('id', '=', $id)->save();
    }

    public function disconnect()
    {
        session_start();
        session_destroy();
        redirect(url('/'));
    }
}
