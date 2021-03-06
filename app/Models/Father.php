<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function student_detail()
    {
        return $this->hasMany(StudentDetail::class);
    }
}
