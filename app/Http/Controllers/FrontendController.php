<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\Instructor;
use App\Models\NoticeBoard;
use App\Models\Order;
use App\Models\Student\Student;
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
    public function notice(){
        $notices = NoticeBoard::where('status',1)->latest()->paginate(10);
        return view('frontend.notice',compact('notices'));
    }

    public function cartPage(Request $request){
          $course = Course::where('id',$request->course_id)->first();
//            $course = Course::where(['id' => $request->course_id, 'status' => 1])->first();
            if(!$course){
                return back();
            }
          return view('frontend.cart',compact('course'));
    }
    public function storeOrderData(Request $request){
      $request->validate([
         'name' => 'required',
          'email' => 'required|unique:students',
          'phone_number' => 'required|unique:students',
         'payment_type' => 'required',
      ]);

        if ($request->student_id){
            $student = Student::findOrFail($request->student_id);
        }else{
            $student = new Student();
            $student->name = $request->name;
            $student->email = strtolower($request->email);
            $student->phone_number = $request->phone_number;
            $student->password =  bcrypt($request->phone_number);
            $student->save();
        }
        $order = new Order();
        $order->student_id = $student->id;
        $order->course_id = $request->course_id;
        $order->payment_type = $request->payment_type;
        $order->payment_status = $request->payment_status;
        $order->total_price = $request->total_price;
        $order->status = 'pending';
        $order->save();
        return redirect()->route('success.page');
    }

    public function successPage(){
        return view('frontend.success');
    }
}
