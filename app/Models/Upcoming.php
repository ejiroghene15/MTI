<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upcoming extends Model
{
    use HasFactory;

    public function tutor()
    {
        return $this->hasOne(User::class, 'id', 'tutor_id');
    }
}
