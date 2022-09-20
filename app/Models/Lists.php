<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Lists extends Model implements TranslatableContract
{
    use Translatable, Sluggable;

    public $useTranslationFallback = true;

    public $translatedAttributes = [
        'title',
        'description',
        'content',
        'pdf_title',
        'pdf',
        'pdf_title_2',
        'pdf_2',
    ];


    protected $fillable = [
        'list_type_id',
        'lists_category_id',
        'slug',
        'image',
        'anons_image',
        'body_image',
        'show_on_slider',
        'pdf_type',
        'video_code',
        'video',
        'media_type',
        'link',
        'link_type',
        'parent_id',
        'right_menu',
        'date',
        'order',
        'count_view',
        'status',
        'creator_id',
        'modifier_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function modifiers()
    {
        return $this->belongsTo(User::class, 'modifier_id');
    }

    public function types()
    {
        return $this->belongsTo(ListType::class, 'lists_types');
    }

    public function parent()
    {
        return $this->belongsTo(Lists::class, 'title');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ListCategory::class, 'lists_category_id');
    }

    public function lists_translation()
    {
        return $this->hasMany(ListsTranslation::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeStatus($query)
    {
        return $query->where('status', 2);
    }

    public function scopeOrder($query)
    {
        return $query->orderBy('order', 'desc');
    }


    public function makeSlug($slugable)
    {
        $slug = SlugService::createSlug(Lists::class, 'slug', $slugable, ['unique' => true]);
        return $slug;
    }
}
