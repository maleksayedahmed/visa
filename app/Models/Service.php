<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public $translatable = ['title', 'description'];

    protected $casts = [
        'status' => 'boolean', // Active or Inactive
    ];

    public function company(){

        return $this->belongsTo(Company::class);
    }

    public function service(){

        return $this->belongsTo(Service::class);
    }
}
