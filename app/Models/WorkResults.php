<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkResults extends Model
{
    use HasFactory;

    protected $fillable = [
        'skp_report_id',
        'type',
        'rencana_hasil_kerja_pimpinan',
        'rencana_hasil_kerja',
    ];

    /**
     * Get the SKP report that owns the work result.
     */
    public function skpReport(): BelongsTo
    {
        return $this->belongsTo(SkpReport::class);
    }

    /**
     * Get the performance indicators for the work result.
     */
    public function performanceIndicators(): HasMany
    {
        return $this->hasMany(PerformanceIndicators::class, 'work_result_id');
    }
}
