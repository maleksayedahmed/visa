<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subheading extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',     // Foreign key to Blog
        'title',       // Subheading title
        'content',     // Content of the subheading
    ];

    // Relationship with Blog
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
