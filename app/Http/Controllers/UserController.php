<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        if (!$user) return response(["message" => "Invalid Email"], 401);
        if (Hash::check($request->password, $user->password)) return response()->json($user, 200);
        return response(["message" => "Invalid Password"], 401);
    }
}
