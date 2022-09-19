<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class MenusCategory extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    public $useTranslationFallback = true;

    protected $dates = ['deleted_at'];

    protected $table = 'menus_categories';

    public array $translatedAttributes = ['title'];

    protected $fillable = [
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

    public function menus_category_translation()
    {
        return $this->hasMany(MenusCategoryTranslation::class);
    }

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }

    public function search($search): Builder
    {
        return empty($search) ? static::query()
            : static::query()
                ->where('id', 'like', '%' . $search . '%')
                ->orWhereHas('menus_category_translation', function (Builder $query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%');
                });
    }
}
