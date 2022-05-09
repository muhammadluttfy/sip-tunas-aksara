<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function student_detail()
    {
        return $this->belongsTo(StudentDetail::class);
    }

    public function father()
    {
        return $this->belongsTo(Father::class);
    }

    public function mother()
    {
        return $this->belongsTo(Mother::class);
    }

    public function mutation()
    {
        return $this->belongsTo(Mutation::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
