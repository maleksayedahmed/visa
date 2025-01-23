<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class UserAddress extends Model
{
    use HasFactory, SoftDeletes, HasTranslations    ;

    public $translatable = ['description'];


    protected $fillable = [
        'description',
        'user_id',
        'area_id',
        'city_id',
        'country_id',
        'type',
        'street_no',
        'building_no',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
