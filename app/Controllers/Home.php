<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
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
