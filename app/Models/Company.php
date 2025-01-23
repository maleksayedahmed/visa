<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Company extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'commercial_number',
        'tax_number',
        'phone',
        'mobile',
        'website',
        'facebook',
        'instagram',
        'twitter',
        'country_id',
        'city_id',
        'area_id',
        'address',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    protected $translatable = ['name'];
    /**
     * Relationships
     */

    // A company belongs to a country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // A company belongs to a city
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // A company belongs to an area (nullable)
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function services()
    {
        return $this->hasMany(CompanyService::class);
    }

    /**
     * Auditing Relationships (Optional: for created_by, updated_by, deleted_by)
     */

    // A company was created by a user
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // A company was updated by a user
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // A company was deleted by a user
    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
