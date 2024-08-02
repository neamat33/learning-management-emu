<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'academic_subject';
    // public function category(){
    //     return $this->belongsTo(ExpenseCategory::class,'category_id','id');
    // }


    public function chapters()
    {
        return $this->hasMany(Chapter::class,'course_subject_id','id');
    }


}
