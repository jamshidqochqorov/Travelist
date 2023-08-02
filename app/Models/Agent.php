<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname','lastname','phone','promo_cod'
    ];
    public function clients(){
        return $this->hasMany(Client::class);
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
