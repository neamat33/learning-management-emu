<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesCollectionDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function  student()
    { 
        return $this->belongsTo(StudentInfo::class,'student_id');
    }
    public function  category()
    { 
        return $this->belongsTo(StudentFeesCategory::class,'tnx_fees_cat','id_sfc');
    }

    
   

}
