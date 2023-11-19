<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    /**
     * Display the login page
     */
    public function loginPage()
    {
        return view("auth.login");
    }
    /**
     * Display the register page
     */
    public function registerPage()
    {
        return view("auth.register");
    }

    function login(LoginRequest $request)
    {
        $user = User::where([
            "email" => $request->email,
        ])->first();
        if (!$user) return response(["error" => "Invalid Email"], 401);
        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken("user-auth");
            return response()->json(["user" => $user, "token" => $token->plainTextToken], 200);
        }
        return response(["error" => "Invalid Password"], 401);
    }

    function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $token = $user->createToken("user-auth");
        return response()->json(["user" => $user, "token" => $token->plainTextToken], 200);
    }
}
