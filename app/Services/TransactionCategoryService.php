<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class TransactionCategoryService
{

    public function get()
    {
        return DB::table('account_transaction_category as c')
            ->select('c.id', 'c.tnx_name', 'c.status_id', 'parent.tnx_name as parent_name','c.tnx_type')
            ->leftjoin('account_transaction_category as parent', 'parent.id', 'c.parent_id')
            ->where('c.status_id', '!=', '2')
            ->orderBy('c.id','DESC')
            ->get();
    }
    public function add($data){
      return  DB::table('account_transaction_category')->insert([
            'tnx_name'=>$data['tnx_name'],
            'parent_id'=>$data['parent_id'],
            'tnx_type'=>$data['tnx_type'],
            'status_id' => 1
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

    public function get_parent($tnx_type)
    {
        
        $transaction = DB::table('account_transaction_category')
            ->where('tnx_type', $tnx_type)
            ->where('parent_id', 0)
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
