<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LpjHeader extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sppd()
    {
        return $this->belongsTo(Sppd::class);
    }

    public function lpjDetail()
    {
        return $this->hasOne(LpjDetail::class, 'lpj_header_id', 'id');
    }
}
