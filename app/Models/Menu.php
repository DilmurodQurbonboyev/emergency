<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Menu extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    public $useTranslationFallback = true;

    protected $table = 'menus';

    public array $translatedAttributes = ['title'];

    protected $fillable = [
        'link',
        'link_type',
        'image',
        'parent_id',
        'menus_category_id',
        'status',
        'order',
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

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function submenus($lang)
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id')
            ->with(
                [
                    'translations' => function ($query) use ($lang) {
                        $query->where('locale', $lang);
                    }
                ]
            );
    }

    public function category()
    {
        return $this->belongsTo(MenusCategory::class, 'menus_category_id');
    }

    public function menus_translation()
    {
        return $this->hasMany(MenuTranslation::class);
    }

    public static function buildTree(array $elements, $parentId = null)
    {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['submenus'] = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
}
