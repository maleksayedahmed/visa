<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    //
    use SoftDeletes, HasTranslations, InteractsWithMedia;

    protected $fillable = ['title',	'description' ,'price' , 'is_offer' , 'status' , 'quantity' ,'category_id' ,'brand_id'
        ,'created_by'	,'updated_by',	'deleted_by' ];

    public $translatable = ['title' ,'description'];


    public function brand(){
        return $this->belongsTo(Brand::class , 'brand_id');
    }

    public function category(){
        return $this->belongsTo(Category::class , 'category_id');
    }
    public function items()
    {
        return $this->hasMany(ProductModelTypeDetail::class, 'product_id');
    }

}
