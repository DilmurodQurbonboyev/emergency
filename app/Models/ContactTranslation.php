<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'address',
        'reception',
        'working_time',
    ];
}
