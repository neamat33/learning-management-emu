<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BatchService;
use App\Services\ClassService;
use App\Services\SectionService;
use App\Services\ShiftService;
use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Services\BranchService;
use App\Services\SubjectService;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{

    public function index(Request $request)
    {
        $branch_id = session('branch_id');
        $instructor =new Instructor;
        if($request->name){
            $instructor->where('name',$request->name);
        }
        if($request->mobile){
            $instructor->where('name',$request->mobile);
        }
        $instructors = $instructor->where('branch_id', $branch_id)->paginate(20);

        return view('admin.instructor.list',compact('instructors'));
    }

    public function create()
    {

        $data['subjects'] = (new SubjectService)->all();
        $data['branchs'] = (new BranchService)->all();
        return view('admin.instructor.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:128',
            'mobile' => "required|numeric|min:11|unique:instructors",
        ]);
        //try {
            DB::beginTransaction();
            $data = $request->all();
            $instructor = Instructor::create($data);
            if($instructor){
                if (!empty($img = $request->file('photo'))) {
                    $name = $img->getClientOriginalName();
                    $ext = pathinfo($name, PATHINFO_EXTENSION);
                    $fileName = 'img-' . rand(1111111, 9999999) . '.' . $ext;
                    $folder = "instructor/";
                    $path = $folder . $fileName;
                    $img->move(public_path($folder), $fileName);
                    DB::table("instructors")->where("id", $instructor->id)->update(['photo' => $path]);
                }
            }
            DB::commit();
            return redirect()->back()->with('success', 'Instructor Created Successfully');
        // } catch (\Exception $e) {
        //     $error_message = $e->getMessage();
        //     return redirect()->route('instructors.create')->with('error', $error_message);
        // }
    }

    public function edit($id)
    {
        $instructor = Instructor::find($id);
        $subjects = (new SubjectService)->all();
        $branchs = (new BranchService)->all();
        return view('admin.instructor.edit', compact('instructor','subjects','branchs'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|max:128',
                'mobile' => "required|numeric|min:11",
            ]);
            $instructor = Instructor::find($id);
            $instructor->branch_id = $request->branch_id;
            $instructor->name = $request->name;
            $instructor->mobile = $request->mobile;
            $instructor->email = $request->email;
            $instructor->subject_id = $request->subject_id;
            $instructor->address = $request->address;
            $instructor->qualification = $request->qualification;
            if (!empty($img = $request->file('photo'))) {
                $name = $img->getClientOriginalName();
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                $fileName = 'img-' . rand(1111111, 9999999) . '.' . $ext;
                $folder = "instructor/";
                $path = $folder . $fileName;
                $img->move(public_path($folder), $fileName);
                DB::table("instructors")->where("id", $instructor->id)->update(['photo' => $path]);
            }
            $instructor->update();
            return redirect()->back()->with('success', 'Instructor Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return back()->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $instructor = Instructor::find($id);
            $instructor->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('classes.index')->with('error', $error_message);
        }
    }

    public function inactive($id){
        $instructor = Instructor::find($id);
        $instructor->status = 0;
        $instructor->save();
        return back()->with('success', 'Status change Successfully!');
    }
    public function active($id){
        $instructor = Instructor::find($id);
        $instructor->status = 1;
        $instructor->save();
        return back()->with('success', 'Status change Successfully!');
    }



    public function get_section(){
       $class_id = $_GET['class_id'];
       $branch_id = $_GET['branch_id'];

      return $this->StudentService->getSection($branch_id,$class_id);

    }

    public function get_student_info(Request $request){
       $student_id = $request->student_id;
      return $student = $this->StudentService->getStudent($student_id);

    }
}
