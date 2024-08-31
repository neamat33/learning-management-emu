<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'course_details' => 'array',
    ];

    public function items(){
        return $this->hasMany(CourseSubject::class);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'course_subject');
    }

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'course_instructor');
    }



}
