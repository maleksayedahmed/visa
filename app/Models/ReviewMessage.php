<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReviewMessage extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'title',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Relationship with the User (Patient or Client).
     */
    public function review()
    {
        return $this->hasOne(Review::class);
    }


}
