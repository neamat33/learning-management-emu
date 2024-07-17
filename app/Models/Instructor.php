<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

}
