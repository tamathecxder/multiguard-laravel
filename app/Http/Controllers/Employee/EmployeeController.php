<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function check(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:employees,email',
            'password' => 'required|min:5|max:30',
        ], [
            'email.exists' => 'The email is not found!',
        ]);

        $credentials = $request->only('email', 'password');

        if ( Auth::guard('employee')->attempt($credentials) ) {
            return redirect()->route('employee.home');
        } else {
            return redirect()->route('employee.login')->with('fail', 'Invalid Credentials, Please Check Again!');
        }
    }

    public function create(Request $request, Employee $employee) {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'jobdesc' => 'required',
            'address' => 'required',
            'age' => 'required',
            'salary' => 'required',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
        ]);

        if ( $validateData ) {
            $validateData['password'] = Hash::make($validateData['password']);
        }

        $employee = Employee::create($validateData);

        if ( $employee ) {
            return redirect()->back()->with('success', 'You are now registered, please continue to login');
        } else {
            return redirect()->back()->with('fail', 'Data that you have input is wrong!');
        }
    }

    public function logout() {
        Auth::guard('employee')->logout();

        return redirect('/');
    }
}

