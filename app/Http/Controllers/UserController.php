<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display the login page
     */
    public function loginPage()
    {
        return view('auth.login');
    }

    /**
     * Display the register page
     */
    public function registerPage()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), User::LOGIN_RULES);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 400);
        }

        $user = User::where([
            'email' => $request->email,
        ])->first();
        if (! $user) {
            return response(['errors' => ['email' => 'Invalid Email']], 401);
        }
        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('user-auth');

            return response()->json(['user' => $user, 'token' => $token->plainTextToken], 200);
        }

        return response(['errors' => ['password' => 'Invalid Password']], 401);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), User::REGISTER_RULES);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 400);
        }

        $user = User::create($request->validated());
        $token = $user->createToken('user-auth');

        return response()->json(['user' => $user, 'token' => $token->plainTextToken], 200);
    }
}
