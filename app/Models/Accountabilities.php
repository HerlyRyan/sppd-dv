<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Accountabilities extends Model
{
    use HasFactory;

    protected $fillable = [
        'skp_report_id',
        'description',
    ];

    /**
     * Get the SKP report that owns the accountability.
     */
    public function skpReport(): BelongsTo
    {
        return $this->belongsTo(SkpReport::class);
    }
}
