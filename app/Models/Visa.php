<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Visa extends Model implements HasMedia
{
    use  HasTranslations, InteractsWithMedia;

    // protected $table = 'visas';

    protected $fillable = ['name',	'description'
    	,'created_by'	,'updated_by',	'deleted_by' , 'slug' , 'status'];

    public $translatable = ['name' ,'description'];

}
