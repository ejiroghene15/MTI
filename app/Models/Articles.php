<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'author_id', 'title', 'slug', 'thumbnail', 'body'];

    protected $attributes = [
        'status' => "Pending",
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    function comments()
    {
        return $this->hasMany(Comments::class, 'post_id');
    }
}
