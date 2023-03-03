<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_date',
        'end_date',
    ];

    // One to Many
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
