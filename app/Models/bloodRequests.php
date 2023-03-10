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
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function donor(){
        return $this->belongsTo(User::class, 'donor_id');
    }
}
