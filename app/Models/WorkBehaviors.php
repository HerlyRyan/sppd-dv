<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkBehaviors extends Model
{
    use HasFactory;

    protected $fillable = [
        'skp_report_id',
        'perilaku_kerja',
        'deskripsi_perilaku',
        'ekspektasi_pimpinan',
    ];

    /**
     * Get the SKP report that owns the work behavior.
     */
    public function skpReport(): BelongsTo
    {
        return $this->belongsTo(SkpReport::class);
    }
}
