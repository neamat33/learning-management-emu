<?php

namespace App\Http\Controllers;

use App\Models\Student\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'email' => 'required|email:rfc,dns|unique:students,email',
            'phone_number' => 'bail|numeric|unique:students,phone_number|digits:11|regex:/^(?:\+?88)?01[3-9]\d{8}$/',
            'password' => 'required|min:8|max:20',
        ]);
        $student = Student::create([
            'phone_number' => $request->phone_number,
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password),
        ]);
        $student->save();
        Auth::guard('student')->login($student);
        return redirect()->route('dashboard.page');



    }
}
