<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function tutor()
    {
        return $this->hasOne(User::class, 'id', 'tutor_id');
    }
}
