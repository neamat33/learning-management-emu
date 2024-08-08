<?php

namespace App\Http\Controllers;

use App\Helpers\InputHelper;
use App\Models\Course;
use App\Models\Student\Student;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    private $file_path;
    public function __construct()
    {
        $this->file_path = 'profile/';
    }

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

    public function showProfile(){
        $userInfo = Student::where('id',auth('student')->user()->id)->first();
        return view('frontend.student.profile_edit',compact('userInfo'));
    }

    public function updateProfile(Request $request,$id){
        $userInfo = Student::findOrFail(decrypt($id));
        $userInfo->name = $request->name;
        $userInfo->about_me = $request->about_me;
        $userInfo->dob = $request->dob;
        $userInfo->education = $request->education;
        $userInfo->address = $request->address;
        if ($request->hasFile('image')) {
            $profile_image = InputHelper::upload($request->image, $this->file_path);
        } else {
            $profile_image = "";
        }
        $userInfo->image = $profile_image;
        $userInfo->save();
        return back();
    }

//    public function downloadImage($id){
//        $course = Course::select('class_routine')->findOrFail(decrypt($id));
//        $imagePath = $course->class_routine;
//        return response()->download(public_path($imagePath));
//    }



    public function downloadImage($id)
    {
        $course = Course::select('class_routine')->findOrFail(decrypt($id));
        $imagePath = public_path($course->class_routine);
        if (file_exists($imagePath)) {
            return response()->download($imagePath);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }


}
