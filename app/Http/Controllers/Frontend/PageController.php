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

    public function agentLogin()
    {
        return view('auth.agent-login');
    }

    public function employerLogin()
    {
        return view('auth.employer-login');
    }

    public function candidateRegister()
    {
        return view('auth.candidate-register');
    }

    public function agentRegister()
    {
        return view('auth.agent-register');
    }

    public function employerRegister()
    {
        return view('auth.employer-register');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
