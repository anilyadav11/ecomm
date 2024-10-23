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
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashbord')
                ->withSuccess('you are successfully login');
        }

        return redirect("login")->withError('Oppes! You have entered invalid credentials');
    }
    public function dashbord()
    {
        if (Auth::check()) {
            return view('dashbord');
        }
        return redirect("login")->withSuccess('opps! do not have access');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
