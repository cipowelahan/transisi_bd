<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AuthRequest;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(AuthRequest $req) {
        if (Auth::attempt($req->only('email', 'password'))) {
            return redirect()->route('companies.index');
        }
        else {
            return back()->withErrors(['auth' => 'email/password salah']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login.get');
    }
}
