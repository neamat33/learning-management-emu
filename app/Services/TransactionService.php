<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class TransactionService
{

    public function get()
    {
        return DB::table('account_transactions as t')
            ->select('t.*','t.status_id', 'parent.tnx_name as category','sub.tnx_name as sub_category','st.student_name','ac.account_name','ac.account_no')
            ->leftjoin('account_transaction_category as parent', 'parent.id', 't.tnx_cat_id')
            ->leftjoin('account_transaction_category as sub', 'sub.id', 't.tnx_subcat_id')
            ->leftjoin('student_info as st', 'st.id', 't.tnx_user_id')
            ->leftjoin('accounts as ac', 'ac.id', 't.tnx_ac_id')
            ->where('t.status_id', '!=', '2')
            ->orderBy('t.id','DESC');
            
    }
    public function add($data){
        return  DB::table('account_transactions')->insert([
            'branch_id' => session('branch_id'),
            'tnx_type_id'=>$data['tnx_type_id'],
            'tnx_cat_id'=>$data['tnx_cat_id'],
            'tnx_subcat_id'=>$data['tnx_subcat_id'],
            'tnx_user_type'=>$data['tnx_user_type'] ?? 0,
            'tnx_user_id'=>$data['tnx_user_id'] ?? 0,
            'tnx_ac_id'=>$data['tnx_ac_id'],
            'payment_method'=>$data['payment_method'],
            'payment_method_des'=>$data['payment_method_des'],
            'tnx_amount'=>$data['amount'],
            'tnx_date'=>$data['tnx_date'],
            'tnx_note'=>$data['note'],
        ]);
        
    }
    public function update($data, $id){
        DB::table('account_transaction_category')->where('id', $id)->update([
            'tnx_name'=>$data['tnx_name'],
            'parent_id'=>$data['parent_id'],
            'tnx_type'=>$data['tnx_type'],
        ]);
        
    }
    public function delete($id){
        DB::table('account_transaction_category')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }

    public function tnx_subcat($cat_id)
    {
        
        $transaction = DB::table('account_transaction_category')
            ->where('parent_id', $cat_id)
            ->where('status_id', 1)
            ->get();
        
        if ($transaction) {
            echo "<option value='0'>--Select--</option>";
            foreach ($transaction as $value) {
                echo "<option value='$value->id'> $value->tnx_name</option>";
            }
        } else {
            echo "<option value=''>Not Found!</option>";
        }
    }
}
