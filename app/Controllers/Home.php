<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if(session()->get('email'))
            return view('home');
        else return redirect()->to('login');
    }

    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function forgotPassword()
    {
        return view('forgot-password');
    }
}
