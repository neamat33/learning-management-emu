<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\Instructor;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

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

    public function contactStore(Request $request){
           $data = new Contact();
           $data->fill($request->all());
           $data->save();
           return back();
    }

    public function contactMessage(){
        $contactMessage = Contact::latest()->paginate(20);
        return view('admin.contact.index',compact('contactMessage'));
    }
    public function messageDelete($id){
        $data = Contact::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data Delete Successfully!');
    }
}
