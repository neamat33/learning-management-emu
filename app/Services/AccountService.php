<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class AccountService
{

    public function get()
    {
        return DB::table('accounts as a')
        ->select('a.*','bn.bank_name','b.branch_name as branch')
        ->leftJoin('accounts_bank_name as bn','a.bank_id','bn.id')
        ->leftJoin('academic_branch as b','a.branch_id','b.id')
        ->where('a.status_id',1);
        
    }
    public function add($data){
        return DB::table('accounts')->insertGetId([
            'branch_id'=>$data['branch_id'],
            'account_name'=>$data['account_name'],
            'acc_type_id'=>$data['acc_type_id'],
            'bank_id'=>$data['bank_id'],
            'branch_name'=>$data['branch_name'],
            'account_no'=>$data['account_no'],
            'tnx_charge'=>$data['tnx_charge'],
            'initial_blance'=>$data['initial_blance'],
            'curr_blance'=>$data['initial_blance'],
            'address'=>$data['address'],
            'status_id'=> 1,
        ]);        
    }

    public function classAssignment($data,$id){
        return DB::table('student_class_assignment')->insert([
            'student_id'=>$id,
            'branch_id'=>$data['branch_id'],
            'class_id'=>$data['class_id'],
            'section_id'=>$data['section_id'],
            'shift_id'=>$data['shift_id'],
            'status_id'=> 1,
        ]);        
    }
    public function update($data, $id){
        DB::table('academic_class')->where('id', $id)->update([
            'class_name'=>$data['class_name'],
            'branch_id'=>$data['branch_id'],
        ]);
        
    }
    public function delete($id){
        DB::table('academic_class')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }

    public function get_bank($bank_type)
    {
        
         $banks = DB::table('accounts_bank_name')
            ->where('bank_type', $bank_type)
            ->get();
        
        if ($banks!=null) {
            foreach ($banks as $value) {
                echo "<option value='$value->id'> $value->bank_name</option>";
            }
        }else{
            echo "<option value=''>Not Found!</option>";
        }
    }
}
