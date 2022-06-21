<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'comperison_id',
    ];

    public static function types(){
        return [
            1 => 'string',
            2 => 'numeric',
        ];
    }

    protected $attributes = [
        'type' => 1,
    ];
    
    // The Accessor & Mutator
    public function type(): Attribute{
        return Attribute::make(
            get: fn ($value) => $this->types()[$value],
            set: fn ($value) => array_search($value,$this->types()),
        );
    }

    public function comparison(){
        return $this->belongsTo(Comparison::class);
    }

    public function fields(){
        return $this->belongsToMany(Type::class)->withPivot('value');
    }
}
