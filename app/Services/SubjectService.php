<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SubjectService
{

    public function get()
    {
        return  DB::table('academic_subject')
        ->where('status_id',1);          
    }
    public function all()
    {
        return  DB::table('academic_subject')      
        ->where('status_id',1)->get();          
    }
    public function add($data){
        DB::table('academic_subject')->insert([
            'subject_name'=>$data['subject_name'],
            'status_id'=> 1,
        ]);        
    }
    public function update($data, $id){
        DB::table('academic_subject')->where('id', $id)->update([
            'subject_name'=>$data['subject_name'], 
        ]);
        
    }
    public function delete($id){
        DB::table('academic_subject')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
