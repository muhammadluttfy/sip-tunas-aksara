<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
    use HasFactory;
    protected $guarded = [''];


    public function student_detail()
    {
        return $this->hasMany(StudentDetail::class);
    }
}
