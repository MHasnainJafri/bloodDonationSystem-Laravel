<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bloodRequests extends Model
{
    use HasFactory;
    public $table="blood_requests";
    protected $guarded;
    public function recipient(){
        return $this->belongsTo(user::class,'recipient_id','id');
    }

    public function donor(){
        return $this->belongsTo(user::class,'donor_id','id');
    }
}
