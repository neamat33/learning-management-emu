<?php

namespace App\Models;

use App\Models\Student\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
