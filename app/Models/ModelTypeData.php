<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class ModelTypeData extends Model implements HasMedia
{

    use SoftDeletes, HasTranslations, InteractsWithMedia;

    protected $fillable = ['title', 'model_type_id'	, 'status' , 'created_by'	,'updated_by',	'deleted_by' ];

    public $translatable = ['title' ];

    public function modelType(){

        return $this->belongsTo(ModelType::class , 'model_type_id');
    }




}
