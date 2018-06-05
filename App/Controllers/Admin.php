<?php

namespace Controller\Admin;

use Controller\Controller as Controller;
use Request\Request as Request;

class Admin extends Controller
{
    public function index()
    {
        view('admin/panel');
    }
}
