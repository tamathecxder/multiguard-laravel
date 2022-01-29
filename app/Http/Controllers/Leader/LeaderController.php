<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaderController extends Controller
{
    public function check(Request $request) {
        // check validation
        $request->validate([
            'email' => 'required|email|exists:leaders,email',
            'password' => 'required|min:5|max:30',
        ],
        // modify error validation
        [
            'email.exists' => 'The email is not found',
        ],

    );

        $credentials = $request->only('email', 'password');

        if ( Auth::guard('leader')->attempt($credentials) ) {
            return redirect()->route('leader.home');
        } else {
            return redirect()->route('leader.login')->with('fail', 'Incorrect leader credentials!');
        }
    }

    public function logout() {
        Auth::guard('leader')->logout();

        return redirect('/');
    }
}
