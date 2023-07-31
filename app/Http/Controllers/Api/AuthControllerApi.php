<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthControllerApi extends Controller
{
    public function Register(request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $admins = new admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));
            $isSaved = $admins->save();
            if ($isSaved) {
                return response()->json([
                    'status' => true,
                    'messege' => 'Created New Acconet is successfully',

                ], 200);
            }
        } else {
            return response()->json([
                'status' => false,
                'messege' => $validator->getMessageBag()->first(),

            ], 400);
        }
    }









    public function Login(request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            $admins = admin::where('email', $request->get('email'))->first();
            if (Hash::check($request->get('password'), $admins->password)) {
                $token = $admins->createToken('admin_api');
                $admins->setAttribute('token', $token->accessToken);
                return $token;
                return response()->json([
                    'status' => true,
                    'message' => 'login is success',

                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'login is faild',

                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'messege' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    public function Logout(Request $request)
    {
        // Check if the user is authenticated
        $admins = $request->user('admin_api');
        if (!$admins) {
            return response()->json([
                'status' => false,
                'message' => 'User is not authenticated.',
            ], 400);
        }

        $token = $admins->token();
        $revoked = $token->revoke();

        return response()->json([
            'status' => $revoked,
            'message' => $revoked ? 'Logout is success' : 'Logout is failed',
        ]);
    }


    public function ForgetPassword(request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|exists:admins,email',
        ]);
        if (!$validator->fails()) {
            $admins = admin::where('email', $request->get('email'))->first();
            $auth_code = random_int(1000, 9999);
            $admins->auth_code = Hash::make($auth_code);
            $isSaved = $admins->save();
            return response()->json([
                'status' => $isSaved,
                'message' => $isSaved ? 'Please check your email for reset password digit four numbers' : 'is Faild',
                'code' => $auth_code
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }







    public function ResetPassword(request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:admins,email',
            'auth_code' => 'required|digits:4',
            'password' => 'required|string|min:3|confirmed',
        ]);
        if (!$validator->fails()) {
            $admins = admin::where('email', $request->get('email'))->first();
            if (Hash::check($request->get('auth_code'), $admins->auth_code)) {
                $admins->password = Hash::make($request->get('password'));
                $admins->auth_code = null;
                $isSaved = $admins->save();
                return response()->json([
                    'status' => $isSaved,
                    'message' => $isSaved ? 'Password has been changed successfully.' : 'is Faild',
                ], $isSaved ? 200 : 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }
}
