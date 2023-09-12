<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Support\Facades\Validator;

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

    public function EditProfile(Request $request)
    {
        $countries = Country::all();
        $guard = auth('admin')->check() ? 'admin' : 'author';
        $admins = admin::with('user')->findOrFail(Auth::guard($guard)->id());
        return response()->view('cms.auth.editprfile', compact('countries', 'admins'));
    }


    public function UpdateProfile(Request $request)
    {
        $validator = validator($request->all(), [
            'image' => "required|image|max:2048|mimes:png,jpg,jpeg,pdf",
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
        ], []);

        if (!$validator->fails()) {
            $guard = auth('admin')->check() ? 'admin' : 'author';
            $admins = admin::findOrFail(Auth::guard($guard)->id());
            $admins->email = $request->get('email');
            // $admins->password = Hash::make($request->get('password'));

            $isSaved = $admins->save();
            if ($isSaved) {
                $users = $admins->user;
                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/admin', $imageName);
                    $users->image = $imageName;
                }
                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get(' mobile');
                $users->status = $request->get('status');
                $users->gender = $request->get('gender');
                $users->birth_date = $request->get('birth_date');
                $users->country_id = $request->get('country_id');
                $users->actor()->associate($admins);
                $isSaved = $users->save();
                return ['redirect' => route('admins.index')];

                return response()->json(['icon' => 'success', 'title' => 'Update is successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Update is falid'], 400);
            }
        } else {
            return response()->json([
                'icon' => 'error', 'title' => $validator->getMessageBag()->first()
            ], 400);
        }
    }


    public function changePassword(Request $request)
    {
        return response()->view('cms.auth.changepassword');
    }


    public function updatePassword(Request $request)
    {
        $guard = auth('admin')->check() ? 'admin' : 'author';
        $validator = Validator($request->all(), [
            'password' => 'required|string|min:3',
            'new_password' => 'required|string|confirmed',
            'new_password_confirmation' => 'required|string'

        ]);
        if (!$validator->fails()) {
            $admins = auth($guard)->user();
            $admins->password = Hash::make($request->get('new_password'));
            $isSaved = $admins->save();
            if ($isSaved) {

                return response()->json([
                    'icon' => 'success',
                    'title' => 'change your password is successfully'
                ], 200);
            } else {
                return response()->json([
                    'icon' => 'error',
                    'title' => 'change your password is failed'
                ], 400);
            }
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first()
            ], 400);
        }
    }
}
