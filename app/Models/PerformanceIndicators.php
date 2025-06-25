<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerformanceIndicators extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_result_id',
        'aspek',
        'indikator_kinerja_individu',
        'target',
    ];

    /**
     * Get the work result that owns the performance indicator.
     */
    public function workResult(): BelongsTo
    {
        return $this->belongsTo(WorkResults::class);
    }
}
