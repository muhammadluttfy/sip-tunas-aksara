<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predicate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function behavior_formation()
    {
        return $this->hasMany(BehaviorFormation::class);
    }
}
