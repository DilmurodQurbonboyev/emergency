<?php

namespace App\Repositories;

use App\Models\MenusCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\MenusCategoryRepositoryInterface;

class MenusCategoryRepository extends Model implements MenusCategoryRepositoryInterface
{
    public function getById($id)
    {
        return MenusCategory::query()->findOrFail($id);
    }

    public function saveCategory($request)
    {
        return MenusCategory::query()->create([
            'oz' => [
                'title' => $request->title_oz,
            ],
            'uz' => [
                'title' => $request->title_uz,
            ],
            'ru' => [
                'title' => $request->title_uz,
            ],
            'en' => [
                'title' => $request->title_en,
            ],
            'status' => $request->status,
            'creator_id' => auth()->user()->id,
        ]);
    }

    public function updateCategory($request, $id)
    {
        return MenusCategory::query()->findOrFail($id)
            ->update([
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
                'status' => $request->status,
                'modifier_id' => auth()->id(),
            ]);
    }


    public function deleteCategory($id)
    {
        return MenusCategory::query()->findOrFail($id)
            ->delete();
    }
}
