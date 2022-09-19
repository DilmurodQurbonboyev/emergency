<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'parent_id',
            'name_oz',
            'name_uz',
            'name_ru',
            'status',
        ];
}
