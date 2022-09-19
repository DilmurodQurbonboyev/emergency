<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Message extends Model implements TranslatableContract
{
    use Translatable;

    public $useTranslationFallback = true;

    public $translatedAttributes = ['title'];

    protected $fillable = ['key'];

    public function message_translation()
    {
        return $this->hasMany(MessageTranslation::class);
    }
}
