<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function candidateLogin()
    {
        return view('auth.candidate-login');
    }

    public function employerLogin()
    {
        return view('auth.employer-login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
