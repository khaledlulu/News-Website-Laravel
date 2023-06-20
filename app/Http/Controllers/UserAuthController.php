<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function showLogin()
    {
        return response()->view('cms.auth.login');
    }
    public function Login(Request $request)
    {
    }
    public function Logout(Request $request)
    {
    }
}
