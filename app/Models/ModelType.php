<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class ModelType extends Model implements HasMedia
{

    use SoftDeletes, HasTranslations, InteractsWithMedia;

    protected $fillable = ['title',	 'status' , 'created_by'	,'updated_by',	'deleted_by' ];

    public $translatable = ['title' ];




}
