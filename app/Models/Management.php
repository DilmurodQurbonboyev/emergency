<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Management extends Model implements TranslatableContract
{
    use HasFactory, Translatable, SoftDeletes;

    public $useTranslationFallback = true;

    public $translatedAttributes = [
        'title',
        'leader',
        'reception',
        'address',
        'biography',
        'description',
        'content',
    ];


    protected $fillable = [
        'list_type_id',
        'm_category_id',
        'slug',
        'image',
        'region_id',
        'anons_image',
        'phone',
        'email',
        'main',
        'fax',
        'order',
        'status',
        'creator_id',
        'modifier_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function types()
    {
        return $this->belongsTo(ListType::class, 'lists_types');
    }

    public function regions()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }

    public function category()
    {
        return $this->belongsTo(MCategory::class, 'm_category_id');
    }

    public function modifiers()
    {
        return $this->belongsTo(User::class, 'modifier_id');
    }

    public function management_translation()
    {
        return $this->hasMany(ManagementTranslation::class);
    }
}
