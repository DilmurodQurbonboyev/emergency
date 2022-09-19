<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class MCategory extends Model implements TranslatableContract
{
    use HasFactory, Translatable, SoftDeletes, Sluggable;

    public $useTranslationFallback = true;
    public $translatedAttributes = ['title'];

    protected $fillable = [
        'list_type_id',
        'parent_id',
        'slug',
        'image',
        'status',
        'creator_id',
        'modifier_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function modifiers()
    {
        return $this->belongsTo(User::class, 'modifier_id');
    }

    public function parent()
    {
        return $this->belongsTo(MCategory::class, 'parent_id');
    }

    public function managements()
    {
        return $this->hasMany(Management::class);
    }

    public function m_category_translation()
    {
        return $this->hasMany(MCategoryTranslation::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function makeSlug($slugable)
    {
        $slug = SlugService::createSlug(MCategory::class, 'slug', $slugable, ['unique' => true]);

        return $slug;
    }
}
