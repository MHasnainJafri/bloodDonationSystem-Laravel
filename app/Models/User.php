<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userinfo(){
        return $this->hasOne(userinfo::class);
    }

    public function donatedBlood(){
        return $this->hasMany(bloodRequests::class, 'recipient_id');
    }
    public function bloodRequests(){
        return $this->hasMany(bloodRequests::class, 'donor_id');
    }
    public function donationCount()
    {
        return $this->bloodRequests()->count();
    }
    public function acceptedCount()
    {
        return $this->donatedBlood()->count();
    }

}
