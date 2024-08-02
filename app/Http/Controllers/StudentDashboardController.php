<?php

namespace App\Http\Controllers;

use App\Models\Course;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

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

//    public function downloadImage($id){
//        $course = Course::select('class_routine')->findOrFail(decrypt($id));
//        $imagePath = $course->class_routine;
//        return response()->download(public_path($imagePath));
//    }



    public function downloadImage($id)
    {
        // Decrypt the ID and find the course
        $course = Course::select('class_routine')->findOrFail(decrypt($id));

        // Get the image path
        $imagePath = public_path($course->class_routine);

        // Check if the file exists
        if (file_exists($imagePath)) {
            // Return the file download response
            return response()->download($imagePath);
        } else {
            // Return a 404 error if the file does not exist
            return response()->json(['error' => 'File not found'], 404);
        }
    }


}
