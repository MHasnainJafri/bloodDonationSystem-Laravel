<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userinfo extends Model
{
    use HasFactory;
    protected $guarded;
    public $table="userinfos";

    public function blood()
    {
        return $this->belongsTo(bloodtype::class, 'BloodType','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
