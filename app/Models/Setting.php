<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [
        'title',
        'email',
        'mobile_number',
        'contact_us',
        'terms_and_condition',
        'facebook',
        'x',
        'instagram',
        'whatsapp',
        'about_us',
    ];

    public  $timestamps = false;
    protected $translatable = ['contact_us' , 'terms_and_condition' , 'about_us'];
}
