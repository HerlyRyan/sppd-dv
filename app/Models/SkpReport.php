<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SkpReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'penilai_id',
        'periode_mulai',
        'periode_selesai',
        'tanggal_penilaian',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'periode_mulai' => 'date',
        'periode_selesai' => 'date',
        'tanggal_penilaian' => 'date',
    ];

    /**
     * Get the pegawai (employee) associated with the SKP report.
     */
    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'pegawai_id');
    }

    /**
     * Get the penilai (assessor) associated with the SKP report.
     */
    public function penilai(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'penilai_id');
    }

    /**
     * Get the work results for the SKP report.
     */
    public function workResults(): HasMany
    {
        return $this->hasMany(WorkResults::class);
    }

    /**
     * Get the work behaviors for the SKP report.
     */
    public function workBehaviors(): HasMany
    {
        return $this->hasMany(WorkBehaviors::class);
    }

    /**
     * Get the supporting resources for the SKP report.
     */
    public function supportingResources(): HasMany
    {
        return $this->hasMany(SupportingResources::class);
    }

    /**
     * Get the accountabilities for the SKP report.
     */
    public function accountabilities(): HasMany
    {
        return $this->hasMany(Accountabilities::class);
    }

    /**
     * Get the consequences for the SKP report.
     */
    public function consequences(): HasMany
    {
        return $this->hasMany(Consequences::class);
    }
}
