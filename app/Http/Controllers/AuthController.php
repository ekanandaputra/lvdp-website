<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function getLogin()
    {
        return view('auth/login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:5'
        ]);

        if (auth()->guard('web')->attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            return redirect('/devices');
        } else {
                return redirect()
                ->back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
