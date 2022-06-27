<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function behavior_formation()
    {
        return $this->belongsTo(BehaviorFormation::class);
    }

    public function language_ability()
    {
        return $this->belongsTo(LanguageAbility::class);
    }

    public function cognitive()
    {
        return $this->belongsTo(Cognitive::class);
    }

    public function physical_motoric()
    {
        return $this->belongsTo(PhysicalMotoric::class);
    }

    public function art()
    {
        return $this->belongsTo(Art::class);
    }


    // ===== Handler untuk menghapus data relasi jika data paret di hapus ===== 
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($raport) {
            $raport->behavior_formation()->delete();
            $raport->language_ability()->delete();
            $raport->cognitive()->delete();
            $raport->physical_motoric()->delete();
            $raport->art()->delete();
        });
    }
}
