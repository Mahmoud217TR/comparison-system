<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    use HasFactory;

    public static function states(){
        return [
            1 => 'private',
            2 => 'public',
        ];
    }

    protected $attributes = [
        'state' => 1,
    ];
    
    // The Accessor & Mutator
    public function state(): Attribute{
        return Attribute::make(
            get: fn ($value) => $this->states()[$value],
            set: fn ($value) => array_search($value,$this->states()),
        );
    }

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
