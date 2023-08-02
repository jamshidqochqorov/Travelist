<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','agent_id','count'
    ];
    public function category(){
        return $this->belongsTo(Category::class)->withTrashed();
    }
    public function agent(){
        return $this->belongsTo(Agent::class);
    }
}
