<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class VisaType extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasTranslations;

    protected $fillable = [
        'name',
    ];

    public $translatable = ['name'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('visatype_cover')->singleFile();
    }

    public function visas()
    {
        return $this->hasMany(Visa::class);
    }
}
