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
        $course =new Course;

        if ($request->name) {
            $course = $course->where('course_title', 'like', '%' . $request->name . '%');
        }

        $courses = $course->where('status', 1)->paginate(20);


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

        ]);


        if ($course) {
            foreach ($request->subject as $key => $subject_id) {
                $itemData['course_id'] = $course->id;
                $itemData['subject_id'] = $subject_id;
                $itemData['instructor_id'] = $request->instructor[$key];
                $itemData['description'] = $request->description[$key];
                $course->items()->create($itemData);
            }
        }
        DB::commit();
        return redirect()->back()->with('success', 'Cousre Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('courses.create')->with('error', $error_message);
        }
    }

    public function edit($id)
    {
        $branch = (new BranchService)->get();
        $class = (new ClassService)->get();
        $shift = (new ShiftService)->get();
        $batch = (new BatchService)->get();
        $section = (new SectionService)->get();

        if (session('role_id') == 1) {
            $data['branches'] = $branch->get();
            $data['classes'] = $class->get();
            $data['batches'] = $batch->get();
            $data['shifts'] = $shift->get();
            $data['sections'] = $section->get();
        } else {
            $data['branches'] = $branch->where('id', session('branch_id'))->get();
            $data['classes'] = $class->where('branch_id', session('branch_id'))->get();
            $data['batches'] = $batch->where('branch_id', session('branch_id'))->get();
            $data['shifts'] = $shift->where('branch_id', session('branch_id'))->get();
            $data['sections'] = $section->where('branch_id', session('branch_id'))->get();
        }

        $data['student'] = DB::table('student_info')->where('id', $id)->first();
        $data['assign'] = DB::table('student_class_assignment')->where('student_id', $id)->first();
        return view('admin.student.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->StudentService->update($data, $id);

            $this->StudentService->classAssignmentUpdate($data, $id);

            return redirect()->route('students.index')->with('success', 'Student Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return back()->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->StudentService->delete($id);
            return redirect()->route('classes.index')->with('success', 'Deleted successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('classes.index')->with('error', $error_message);
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
}
