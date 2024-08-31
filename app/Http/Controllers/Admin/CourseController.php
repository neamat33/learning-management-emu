<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Instructor;
use App\Services\BranchService;
use App\Services\SubjectService;
use App\Helpers\InputHelper;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\CourseSubject;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    private $file_path;
    public function __construct()
    {
        $this->file_path = 'course/';
    }
    public function index(Request $request)
    {
        $branch_id = session('branch_id');
        $course = new Course;

        if ($request->name) {
            $course = $course->where('course_title', 'like', '%' . $request->name . '%');
        }
        $courses = $course->latest()->paginate(20);


        return view('admin.course.list', compact('courses'));
    }

    public function create()
    {
        $data['subjects'] = (new SubjectService)->all();
        $data['instructors'] = Instructor::get();
        $data['categories'] = Category::get();
        return view('admin.course.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_title' => 'required|max:128',
            'course_description' => "required",
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $item_image = InputHelper::upload($request->image, $this->file_path);
            } else {
                $item_image = "";
            }
            if ($request->hasFile('class_routine')) {
                $class_routine = InputHelper::upload($request->class_routine, $this->file_path);
            } else {
                $class_routine = "";
            }
            $course = Course::create([
                'category_id' =>  $request->category_id,
                'course_title' =>  $request->course_title,
                'start_date'     => $request->start_date,
                'image'          => $item_image,
                'class_routine'  => $class_routine,
                'video'     => $request->video,
                'price'     => $request->price,
                'discount_price'     => $request->discount_price,
                'course_description' => $request->course_description,
                'course_details' => json_encode($request->course_details)
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Course Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('courses.create')->with('error', $error_message);
        }
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $subjects = (new SubjectService)->all();
        $instructors = Instructor::get();
        $categories = Category::get();
        return view('admin.course.edit', compact('course','subjects','instructors','categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'course_title' => 'required|max:128',
            'course_description' => "required",
        ]);
        try {
            DB::beginTransaction();
            $course = Course::findOrFail($id);
            if ($request->hasFile('image')) {
                $item_image = InputHelper::upload($request->image, $this->file_path);
            } else {
                $item_image = $course->image;
            }
            if ($request->hasFile('class_routine')) {
                $class_routine = InputHelper::upload($request->class_routine, $this->file_path);
            } else {
                $class_routine = $course->class_routine;
            }
            $course_details = $request->course_details;
            if (is_array($course_details)) {
                if (isset($course_details['chapter']) && is_array($course_details['chapter'])) {
                    foreach ($course_details['chapter'] as &$chapters) {
                        if (is_array($chapters)) {
                            $chapters = array_filter($chapters, function ($value) {
                                return $value !== null;
                            });
                        }
                    }
                }
            }
            $course->update([
                'category_id' =>  $request->category_id,
                'course_title' =>  $request->course_title,
                'start_date'     => $request->start_date,
                'image'          => $item_image,
                'class_routine'  => $class_routine,
                'video'     => $request->video,
                'price'     => $request->price,
                'discount_price'     => $request->discount_price,
                'course_description' => $request->course_description,
                'course_details' => json_encode($course_details)
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Course Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->back()->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $course = Course::findOrFail($id);
            if ($course->image && file_exists(storage_path('app/public/' . $course->image))) {
                unlink(public_path('app/public/' . $course->image));
            }

            if ($course->class_routine && file_exists(storage_path('app/public/' . $course->class_routine))) {
                unlink(public_path('app/public/' . $course->class_routine));
            }

            $course->delete();
            return redirect()->route('courses.index')->with('success', 'Course Deleted Successfully!');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('courses.index')->with('error', $error_message);
        }
    }

    public function get_section()
    {
        $class_id = $_GET['class_id'];
        $branch_id = $_GET['branch_id'];

        return $this->StudentService->getSection($branch_id, $class_id);
    }

    public function get_student_info(Request $request)
    {
        $student_id = $request->student_id;
        return $student = $this->StudentService->getStudent($student_id);
    }

    public function inactive($id){
        $data = Course::where('id',$id)->first();
        $data->status = 0;
        $data->save();
        return back()->with('success', 'Status change Successfully!');
    }
    public function active($id){
        $data = Course::where('id',$id)->first();
        $data->status = 1;
        $data->save();
        return back()->with('success', 'Status change Successfully!');
    }

}
