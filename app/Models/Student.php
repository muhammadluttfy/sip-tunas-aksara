<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


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


    // ===== Handler untuk menghapus data relasi jika data paret di hapus ===== 
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($student) {
            $student->student_detail()->delete();
            $student->father()->delete();
            $student->mother()->delete();
            $student->mutation()->delete();
        });
    }
}
