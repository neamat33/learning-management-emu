<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class StudentService
{

    public function get()
    {
        return DB::table('student_info as student')
        ->select('student.*','ab.branch_name','ac.class_name','section.section_name','shift.shift_name','batch.batch_name')
        ->leftJoin('student_class_assignment as sca','sca.student_id','student.id')
        ->leftJoin('academic_branch as ab','ab.id','sca.branch_id')
        ->leftJoin('academic_class as ac','ac.id','sca.class_id')
        ->leftJoin('academic_batch as batch','batch.id','sca.batch_id')
        ->leftJoin('academic_section as section','section.id','sca.section_id')
        ->leftJoin('academic_shift as shift','shift.id','sca.shift_id')
        ->where('ac.status_id',1);
        
    }
    public function getStudent($id)
    {
        return DB::table('student_info as student')
        ->select('student.*','ab.branch_name','ac.class_name','section.section_name','shift.shift_name','batch.batch_name')
        ->leftJoin('student_class_assignment as sca','sca.student_id','student.id')
        ->leftJoin('academic_branch as ab','ab.id','sca.branch_id')
        ->leftJoin('academic_class as ac','ac.id','sca.class_id')
        ->leftJoin('academic_batch as batch','batch.id','sca.batch_id')
        ->leftJoin('academic_section as section','section.id','sca.section_id')
        ->leftJoin('academic_shift as shift','shift.id','sca.shift_id')
        ->where('ac.status_id',1)
        ->where('student.id', $id)->first();
        
    }
     
    public function add($data){
        return DB::table('student_info')->insertGetId([
            'student_name'=>$data['student_name'],
            'mobile'=>$data['mobile'],
            'email'=>$data['email'],
            'dob'=>$data['dob'],
            'father_name'=>$data['father_name'],
            'mother_name'=>$data['mother_name'],
            'father_mobile'=>$data['father_mobile'],
            'mother_mobile'=>$data['mother_mobile'],
            'father_email'=>$data['father_email'],
            'mother_email'=>$data['mother_email'],
            'present_address'=>$data['present_address'],
            'permanent_address'=>$data['permanent_address'],
            'status_id'=> 1,
        ]);        
    }

    public function classAssignment($data,$id){
        return DB::table('student_class_assignment')->insert([
            'student_id'=>$id,
            'branch_id'=>$data['branch_id'],
            'class_id'=>$data['class_id'],
            'batch_id'=>$data['batch_id'],
            'section_id'=>$data['section_id'],
            'shift_id'=>$data['shift_id'],
            'status_id'=> 1,
        ]);        
    }
   
    public function update($data, $id){
      
        $updateData = [
            'student_name' => $data['student_name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'father_name' => $data['father_name'],
            'mother_name' => $data['mother_name'],
            'father_mobile' => $data['father_mobile'],
            'mother_mobile' => $data['mother_mobile'],
            'father_email' => $data['father_email'],
            'mother_email' => $data['mother_email'],
            'present_address' => $data['present_address'],
            'permanent_address' => $data['permanent_address'],
        ];
        
       return $student_info = DB::table('student_info')->where('id', $id)->update($updateData);
          
        
    }

    public function classAssignmentUpdate($data,$id){
       
        $updateData = [
            'branch_id'=>$data['branch_id'],
            'class_id'=>$data['class_id'],
            'batch_id'=>$data['batch_id'],
            'section_id'=>$data['section_id'],
            'shift_id'=>$data['shift_id'],                          
        ];  
        return DB::table('student_class_assignment')->where('student_id', $id)->update($updateData); 
    }

    public function delete($id){
        DB::table('academic_class')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }

    public function getSection($branch_id,$class_id)
    {
        
        $sections = DB::table('academic_class_settings as acs')
            ->select('sec.section_name','acs.section_id')
            ->leftJoin('academic_section as sec','acs.section_id','sec.id')
            ->where('acs.status_id', 1)
            ->where('acs.class_id', $class_id)
            ->where('acs.branch_id', $branch_id)
            ->get();
        
        if ($sections) {
            echo "<option value='' disabled selected>--Select--</option>";
            foreach ($sections as $value) {
                echo "<option value='$value->section_id'> $value->section_name</option>";
            }
        } else {
            echo "<option value=''>Not Found!</option>";
        }
    }
}
