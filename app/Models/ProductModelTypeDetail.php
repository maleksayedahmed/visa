<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class ProductModelTypeDetail extends Model implements HasMedia
{

    use SoftDeletes, HasTranslations, InteractsWithMedia;

    protected $table ='products_model_types_details';
    protected $fillable = ['product_id', 'model_type_id' ,'model_type_data_id', 'model_type_details' , 'created_by'	,'updated_by',	'deleted_by' ];

    public $translatable = ['title' ];

    public function modelType(){

        return $this->belongsTo(ModelType::class , 'model_type_id');
    }

    public function modelTypeData(){

        return $this->belongsTo(ModelTypeData::class , 'model_type_data_id');
    }

    public function product(){

        return $this->belongsTo(Product::class , 'product_id');
    }




}
