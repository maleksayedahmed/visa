<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Doctor extends Model implements HasMedia
{

    use SoftDeletes, HasTranslations, InteractsWithMedia ;
    protected $table = "doctors_info";
    protected $fillable = ['user_id','bio'	 , 'doctor_specialization_id' , 'start_work',
        'end_work', 'detection_time',
        ];

    public $translatable = ['bio' ];


    public function user(){
        return $this->belongsTo( User::class, 'user_id');
    }

    public function specialize(){
        return $this->belongsTo( DoctorSpecialization::class, 'doctor_specialization_id');
    }

    public function getFormattedDetectionTimeAttribute()
    {
        return $this->detection_time . ' minutes';
    }

    public function workingDays()
    {
        return $this->hasMany(WorkingDay::class);
    }

}
