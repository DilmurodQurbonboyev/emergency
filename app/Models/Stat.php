<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Stat extends Model implements TranslatableContract
{
    use Translatable;
    public $useTranslationFallback = true;

    public $translatedAttributes = [
        'title',
    ];

    protected $fillable = [
        'image',
        'year',
        'count'
    ];
}
