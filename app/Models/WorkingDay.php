<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkingDay extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'doctor_id',      // Foreign key to the doctors table
        'working_date',   // The working date
    ];

    /**
     * Define the relationship with the Doctor model.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
