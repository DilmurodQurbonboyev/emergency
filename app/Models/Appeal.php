<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    protected $fillable = [
        'fullname',
        'organization',
        'phone',
        'email',
        'appeal_type',
        'address',
        'region_id',
        'code',
        'photo',
        'file',
        'status',
        'message',
        'answer_file',
        'display',
        'answer',
        'user_ip',
        'browser_agent',
    ];
}
