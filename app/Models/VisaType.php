<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class VisaType extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'name',
    ];

    // public $translatable = ['name'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('visatype_cover')->singleFile();
    }
}
