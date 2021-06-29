<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'google_id',
        'email_verification_token',
        'bio',
        'phone_number',
        'picture',
        'role',
        'course',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses_registered()
    {
        // * the method below checks how many courses the user has registered for based on payment made.
        return $this->hasMany(Payments::class, 'user', 'email');
    }

    public function class_info()
    {
        //* the class model is accessed using payments as an intermediary, checking if the user has paid thereby giving access to the class info
        // * it defines users only being able to see the class information that they registered and paid for.
        // * the user is able to access a class and see the information details based payments made.
        // * this relationship is defined via the eloquent model below.
        // * user => payments -> user on payments table
        // * event_link_id =>  payments -> class on payments table
        // * email => local key on users table -> payments (foreign)
        // * link_id => local key on classes table -> payments(foreign)
        return $this->hasManyThrough(Classes::class, Payments::class, 'user', 'link_id', 'email', 'event_link_id');
    }
}
