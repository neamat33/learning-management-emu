<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function instructor(){
        return $this->belongsTo(Instructor::class,'instructor_id','id');
    }
    public function chapter(){
        return $this->hasMany( Chapter::class,'course_subject_id','id');
    }


}
