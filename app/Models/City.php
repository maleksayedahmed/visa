<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    //
    use SoftDeletes, HasTranslations;

    protected $fillable = ['name',	'country_id',	'postal_code', 'status'];

    public $translatable = ['name'];

    public function country(){
        return $this->belongsTo(Country::class , 'country_id');
    }


}
