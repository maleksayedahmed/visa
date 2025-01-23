<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Coupon extends Model implements HasMedia
{

    use SoftDeletes, HasTranslations, InteractsWithMedia ;
    protected $fillable = ['coupon_code','type'	 , 'no_of_used',
        'price' , 'coupon_details_message' , 'status' , 'created_by' , 'updated_by' , 'deleted_by','start_date' , 'end_date'] ;

    public $translatable = ['coupon_details_message' ];



}
