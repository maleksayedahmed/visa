<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'image',         // Add the image field
        'image_caption', // Add the image_caption field
        'content',       // Add content field if not already present
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subheadings()
    {
        return $this->hasMany(Subheading::class); // Define relationship with Subheading model
    }

    // Auditing relationships (optional)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
