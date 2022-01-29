<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request) {
        // Validate inputs
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make( $request->password );

        $save = $user->save();

        if( $save ) {
            return redirect()->back()->with('success', 'You are now registered successfully');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }
    }

    public function check(Request $request) {
        $request->validate([
            'email' => 'required|exists:users,email|email',
            'password' => 'required|min:5|max:30',
        ], [
            'email.exists' => 'This email are not exist',
        ]);

        $credentials = $request->only('email', 'password');

        if ( Auth::guard('web')->attempt($credentials) ) {
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.login')->with('fail', 'Incorrect credentials');
        }
    }

    public function logout() {
        Auth::guard('web')->logout();

        return redirect('/');
    }

}
