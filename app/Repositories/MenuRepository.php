<?php

namespace App\Repositories;

use App\Interfaces\MenuRepositoryInterface;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MenuRepository extends Model implements MenuRepositoryInterface
{
    public function getById($id)
    {
        return Menu::query()->findOrFail($id);
    }

    public function saveMenu($request)
    {
        try {
            Menu::query()->create([
                'oz' => [
                    'title' => $request->title_oz,
                ],
                'uz' => [
                    'title' => $request->title_uz,
                ],
                'ru' => [
                    'title' => $request->title_ru,
                ],
                'en' => [
                    'title' => $request->title_en,
                ],
                'parent_id' => $request->parent_id,
                'link' => $request->link,
                'link_type' => $request->link_type,
                'image' => $request->image,
                'menus_category_id' => $request->menus_category_id,
                'order' => $request->order,
                'status' => $request->status,
                'creator_id' => auth()->user()->id,
            ]);
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }

    public
    function updateMenu($request, $id)
    {
        Menu::query()->findOrFail($id)->update([
            'oz' => [
                'title' => $request->title_oz,
            ],
            'uz' => [
                'title' => $request->title_uz,
            ],
            'ru' => [
                'title' => $request->title_ru,
            ],
            'en' => [
                'title' => $request->title_en,
            ],
            'parent_id' => $request->parent_id,
            'link' => $request->link,
            'link_type' => $request->link_type,
            'image' => $request->image,
            'menus_category_id' => $request->menus_category_id,
            'order' => $request->order,
            'status' => $request->status,
            'modifier_id' => auth()->id(),
        ]);
    }

    public
    function deleteMenu($id)
    {
        return Menu::query()->findOrFail($id)->delete();
    }
}
