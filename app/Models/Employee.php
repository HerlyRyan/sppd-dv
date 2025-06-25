<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function functional_position()
    {
        return $this->belongsTo(FunctionalPosition::class);
    }

    public function skpAsPegawai()
    {
        return $this->hasMany(SkpReport::class, 'pegawai_id');
    }

    public function skpAsPenilai()
    {
        return $this->hasMany(SkpReport::class, 'penilai_id');
    }
}
