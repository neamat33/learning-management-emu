<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function dashboard(){
        return view('frontend.student.dashboard');
    }
    public function courseList(){
        return view('frontend.student.course_list');
    }

    public function courseDetails(){
        return view('frontend.student.course_details');
    }
    public function quiz(){
        return view('frontend.student.quiz');
    }
    public function updateProfile(){
        return view('frontend.student.profile_edit');
    }

}
