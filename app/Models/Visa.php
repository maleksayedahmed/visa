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
        'visa_type',
        'cost',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public $translatable = ['name', 'description','visa_type' ];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
