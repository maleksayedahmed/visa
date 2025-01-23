<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Area extends Model
{
    //
    use SoftDeletes, HasTranslations;

    protected $fillable = ['name',	'city_id', 'status'];

    public $translatable = ['name'];

    public function City(){
        return $this->belongsTo(City::class , 'city_id');
    }


}
