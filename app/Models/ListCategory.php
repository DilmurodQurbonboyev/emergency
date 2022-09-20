<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;


class ListCategory extends Model implements TranslatableContract
{
    use Translatable, Sluggable;

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

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function modifiers(): BelongsTo
    {
        return $this->belongsTo(User::class, 'modifier_id');
    }

    public function types(): BelongsTo
    {
        return $this->belongsTo(ListType::class, 'list_types');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ListCategory::class, 'parent_id');
    }

    public function lists_category_translation(): HasMany
    {
        return $this->hasMany(ListCategoryTranslation::class);
    }

    public function lists(): HasMany
    {
        return $this->hasMany( Lists::class,'lists_category_id', 'id');
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
        $slug = SlugService::createSlug(
            ListCategory::class,
            'slug',
            $slugable,
            [
                'unique' => true
            ]
        );

        return $slug;
    }
}
