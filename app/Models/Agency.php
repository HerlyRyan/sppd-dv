<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'instansi'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
