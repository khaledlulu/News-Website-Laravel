<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    public function showLogin($guard)
    {
        return response()->view('cms.auth.login', compact('guard'));
    }
    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
            // 'remember' => 'boolean',
            // 'guard' => 'required|string|in:admin'
        ], [
            'email.required' => 'رجاء, أدخل البريد الإلكتروني',
            'email.email' => 'البريد الإلكتروني المدخل غير صحيح',
            'password.required' => 'رجاء, أدخل كلمة المرور',
            'guard.in' => 'تأكد من صحة رابط صفحة تسجيل الدخول'
        ]);

        $credenials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            // 'remember' => $request->get('remember'),

        ];

        if (!$validator->fails()) {
            if (Auth::guard($request->get('guard'))->attempt($credenials)) {
                return response()->json(['icon' => 'success', 'title' => 'Login sucssefully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Login is Failed'], 400);
            }
        }
        return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
    }
    public function logout(Request $request)
    {
        $guard = auth('admin')->check() ? 'admin' : 'author';
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('login.view', $guard);
    }
}
