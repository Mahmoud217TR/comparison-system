<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    use HasFactory;

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function types(){
        return $this->hasMany(Type::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
