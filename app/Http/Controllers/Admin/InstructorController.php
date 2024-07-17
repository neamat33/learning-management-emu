<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $instructors = $instructor->where('status_id',1)->where('branch_id', $branch_id)->paginate(20);
        
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
                
                // save image
               
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
        $branch = (new BranchService)->get();
        $class = (new ClassService)->get();
        $shift = (new ShiftService)->get();
        $batch = (new BatchService)->get();
        $section = (new SectionService)->get();

        if(session('role_id')==1){ 
            $data['branches'] = $branch->get();
            $data['classes'] = $class->get();
            $data['batches'] = $batch->get();
            $data['shifts'] = $shift->get();
            $data['sections'] = $section->get();
        }else{
            $data['branches'] = $branch->where('id',session('branch_id'))->get();
            $data['classes'] = $class->where('branch_id',session('branch_id'))->get();
            $data['batches'] = $batch->where('branch_id',session('branch_id'))->get();
            $data['shifts'] = $shift->where('branch_id',session('branch_id'))->get();
            $data['sections'] = $section->where('branch_id',session('branch_id'))->get();
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
            
            $this->StudentService->classAssignmentUpdate($data,$id); 
            
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
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('classes.index')->with('error', $error_message);
        }
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