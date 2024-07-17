<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesCollection extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function  items()
    { 
        return $this->hasMany(FeesCollectionDetail::class,'fees_collection_id','id');
    }

    public function  student()
    { 
        return $this->belongsTo(StudentInfo::class,'student_id');
    }
   

    private static function generateInvoiceId()
    {
        $prefix = 'F-';
        $lastInvoice = self::orderBy('id', 'desc')->first();

        if ($lastInvoice) {
            $lastNumber = (int) str_replace($prefix, '', $lastInvoice->invoice_id);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 11111; // Starting number
        }

        return $prefix . str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->invoice_id)) {
                $model->invoice_id = self::generateInvoiceId();
            }
        });
    }

    
}



