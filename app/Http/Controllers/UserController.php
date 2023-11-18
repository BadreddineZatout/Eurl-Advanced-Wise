<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
