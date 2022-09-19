<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuthLog extends Model
{
    protected $fillable = [
        'user_id',
        'authority_id',
        'description',
        'user_ip'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function authorities(): BelongsTo
    {
        return $this->belongsTo(Authority::class, 'authority_id');
    }
}
