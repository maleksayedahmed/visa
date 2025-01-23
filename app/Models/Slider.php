<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Slider extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, HasTranslations , InteractsWithMedia;


    protected $fillable = [
        'title',
        'description',
        'product_id',
        'link',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public $translatable = ['title' ,'description'];

    /**
     * Relationship with the User (Patient or Client).
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
