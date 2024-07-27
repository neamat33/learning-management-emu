<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function coursePage(){
         $allCourses = Course::where('status',1)->get();
        return view('frontend.courses',compact('allCourses'));
    }
    public function courseDetailsPage($id){
        $course = Course::findOrFail(decrypt($id));
        return view('frontend.course_details',compact('course'));
    }
}
