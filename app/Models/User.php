<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'site_id', 'phone', 'resume',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function projects()
    // {
    //     return $this->hasMany(Project::class, 'owner_id');
    // }

    public function isVerified()
    {
        return (bool) $this->email_verified_at;
    }
    public function isNotVerified()
    {
        return ! $this->email_verified_at;
    }
}
