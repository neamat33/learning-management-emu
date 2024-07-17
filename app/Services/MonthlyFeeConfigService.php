<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class MonthlyFeeConfigService
{

    public function get()
    {
        return  DB::table('monthly_fees_configurations as mfc')
        ->select('mfc.*','ab.branch_name','ac.class_name')
        ->leftJoin('academic_branch as ab','ab.id','mfc.id')
        ->leftJoin('academic_class as ac','ac.id','mfc.id')
        ->where('mfc.status_id',1);
                  
    }
    public function add($data){
        DB::table('monthly_fees_configurations')->insert([
            'branch_id'=>$data['branch_id'],
            'class_id'=>$data['class_id'],
            'amount'=>$data['amount'],
            'status_id'=> 1,
        ]);        
    }
    public function update($data, $id){
        DB::table('monthly_fees_configurations')->where('id', $id)->update([
            'branch_id'=>$data['branch_id'],
            'class_id'=>$data['class_id'],
            'amount'=>$data['amount'],
        ]);
        
    }
    public function delete($id){
        DB::table('monthly_fees_configurations')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
