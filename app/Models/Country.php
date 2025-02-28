<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Country extends Model implements HasMedia
{
    //
    use SoftDeletes, HasTranslations , InteractsWithMedia;

    protected $fillable = ['name',	'country_iso',	'currency_iso'
    	,'currency_name'	,'country_code',	'status'];

    public $translatable = ['name'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('country')->singleFile();
        $this->addMediaCollection('country_cover')->singleFile();
    }

}
