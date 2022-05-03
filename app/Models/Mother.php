<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
