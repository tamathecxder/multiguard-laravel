<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function check(Request $request) {
        // Validate login admin inputs
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30',
        ],
        // modify validation error messages
        [
            'email.exists' => 'Email is not found',
        ]);

        // Checking the credentials
        $credentials = $request->only('email', 'password');

        if ( Auth::guard('admin')->attempt($credentials) ) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials!');
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
