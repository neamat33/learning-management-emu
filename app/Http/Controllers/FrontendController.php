<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\Instructor;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::with('course')->where('status', 1)->limit(7)->get();
        $courses = Course::with('items.subject')->where('status', 1)->get();
        return view('frontend.index',compact('categories','courses'));
    }
    public function coursePage(){
         $allCourses = Course::where('status',1)->paginate(16);
        return view('frontend.courses',compact('allCourses'));
    }
    public function courseDetailsPage($id){
        $course = Course::findOrFail(decrypt($id));
        $getInstructors = CourseSubject::where('course_id',$course->id)->with('instructor','subject','chapter')->get();
        return view('frontend.course_details',compact('course','getInstructors'));
    }
    public function aboutUs(){
        $instructors = Instructor::where('status',1)->get();
        return view('frontend.about_us',compact('instructors'));
    }
    public function contactUs(){
        return view('frontend.contact_us');
    }
}
