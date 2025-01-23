<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class DoctorSpecialization extends Model implements HasMedia
{
    //
    use SoftDeletes, HasTranslations, InteractsWithMedia;

    protected $fillable = ['title','created_by'	,'updated_by',	'deleted_by' , 'status'];

    public $translatable = ['title' ,'description'];


}
