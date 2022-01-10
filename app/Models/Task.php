<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'status_id',
        'priority_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priority::class);
    }

    public function scopeFilter(Builder $query, array $filteringParams)
    {
        $query->orderBy($filteringParams['orderBy'] ?? 'name', $filteringParams['sortBy'] ?? 'asc')->orderBy('id');
    }

    /**
     * Scope where status_id equal id: 1(Assigned), 2(In progress), but not 3(Done).
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status_id', [1,2]);
    }
}
