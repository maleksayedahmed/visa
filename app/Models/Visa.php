<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Visa extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'country_id',
        'visa_type_id',
        'cost',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public $translatable = ['name', 'description'];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function visaType()
    {
        return $this->belongsTo(VisaType::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('visa_image')->singleFile();
    }
}
