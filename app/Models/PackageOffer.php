<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class PackageOffer extends Model implements HasMedia
{
    //
    use SoftDeletes, HasTranslations, InteractsWithMedia;
    // protected $table = 'package_offers';
    protected $fillable = ['title' ,'price' , 'start_date' ,'end_date' , 'status' , 'quantity'
        ,'created_by'	,'updated_by',	'deleted_by' ];

    public $translatable = ['title' ];



}
