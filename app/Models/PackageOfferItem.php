<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PackageOfferItem extends Model implements HasMedia
{
    //
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = ['product_id' ,'package_offer_id' , 'price' , 'quantity'];



}
