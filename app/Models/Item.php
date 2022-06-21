<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function comparison(){
        return $this->belongsTo(Comparison::class);
    }

    public function fields(){
        return $this->belongsToMany(Type::class)->withPivot('value');
    }
}
