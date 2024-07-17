<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'academic_branch';
    // public function category(){
    //     return $this->belongsTo(ExpenseCategory::class,'category_id','id');
    // }

}
