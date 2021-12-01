<?php

namespace App\Models;

use App\Rules\ColumnExist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'status_id',
        'priority_id'
    ];

    protected $with = ['user', 'status', 'priority'];

    public function scopeFilter($query)
    {
        $query->orderBy(request('orderBy') ?? 'name', request('sortBy') ?? 'asc');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
