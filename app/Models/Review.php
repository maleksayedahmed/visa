<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'type',
        'review_message_id',
        'details',
        'user_id ',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Relationship with the User (Patient or Client).
     */
    public function message()
    {
        return $this->belongsTo(ReviewMessage::class);
    }


}
