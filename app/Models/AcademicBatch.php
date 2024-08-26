<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicBatch extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'academic_batch';
}
