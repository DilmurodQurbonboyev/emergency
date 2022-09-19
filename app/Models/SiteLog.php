<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'row_id',
        'type',
        'user_id',
        'authority_id',
        'user_ip',
        'url',
        'action',
        'user_agent',
    ];


    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
