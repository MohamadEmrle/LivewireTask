<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('pages.register');
    }
    public function login()
    {
        return view('pages.login');
    }
    public function dashboard()
    {
        return view('pages.dashboard');
    }
}
