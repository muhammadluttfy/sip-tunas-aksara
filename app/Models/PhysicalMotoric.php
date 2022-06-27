<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalMotoric extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function raport()
    {
        return $this->hasOne(Raport::class);
    }

    public function predicate()
    {
        return $this->belongsTo(Predicate::class);
    }
}
