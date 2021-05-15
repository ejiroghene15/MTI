<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function tutor()
    {
        return $this->hasOne(User::class, 'id', 'tutor_id');
    }

    public function payments()
    {
        return $this->hasMany(Payments::class, 'event_id', 'id');
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 2);
    }

    public function getOriginalPriceAttribute($value)
    {
        return number_format($value, 2);
    }
}
