<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'state',
        'user_id',
    ];

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

    // Relations
    public function items(){
        return $this->hasMany(Item::class);
    }

    public function types(){
        return $this->hasMany(Type::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopePrivate($query){
        return $query->where('state', '=', 1);
    }

    public function scopePublic($query){
        return $query->where('state', '=', 2);
    }

    // Functions
    public function isPrivate(){
        return $this->state = 'private';
    }

    public function isPublic(){
        return $this->state = 'public';
    }
}
