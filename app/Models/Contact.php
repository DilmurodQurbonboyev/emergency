<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class Contact extends Model implements TranslatableContract
{
    use Translatable;

    public $useTranslationFallback = true;

    public $translatedAttributes = [
        'address',
        'reception',
        'working_time',
    ];

    protected $fillable = [
        'phone',
        'email',
        'longitude',
        'latitude',
    ];
}
