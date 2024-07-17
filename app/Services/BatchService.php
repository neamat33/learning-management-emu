<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class BatchService
{

    public function get()
    {
        return  DB::table('academic_batch as batch')
        ->select('batch.*','ab.branch_name')
        ->leftJoin('academic_branch as ab','ab.id','batch.branch_id')
        ->where('batch.status_id',1);
                  
    }
    public function add($data){
        DB::table('academic_batch')->insert([
            'batch_name'=>$data['batch_name'],
            'branch_id'=>$data['branch_id'],
            'status_id'=> 1,
        ]);        
    }
    public function update($data, $id){
        DB::table('academic_batch')->where('id', $id)->update([
            'batch_name'=>$data['batch_name'],
            'branch_id'=>$data['branch_id'], 
        ]);
        
    }
    public function delete($id){
        DB::table('academic_batch')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
