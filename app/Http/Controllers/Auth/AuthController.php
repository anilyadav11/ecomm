<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\view\view;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index(): view
    {
        return view('auth.login');
    }
}
