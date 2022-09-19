<?php

namespace App\Repositories;

use App\Interfaces\ManagementCategoryRepositoryInterface;
use App\Models\MCategory;
use Illuminate\Database\Eloquent\Model;

class ManagementCategoryRepository extends Model implements ManagementCategoryRepositoryInterface
{
    public function getById($id)
    {
        return MCategory::findOrFail($id);
    }

    public function saveManagementCategory($request, $mcategory)
    {
        $slug = '';
        $slugArray = [
            $request->title_oz,
            $request->title_uz,
            $request->title_ru,
            $request->title_en,
        ];

        foreach ($slugArray as $item) {
            if (!is_null($item)) {
                $slug = $mcategory->makeSlug($item);
                break;
            }
        }

        MCategory::create([
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
            'list_type_id' => $request->list_type_id,
            'parent_id' => $request->parent_id,
            'slug' => $slug,
            'image' => $request->image,
            'order' => $request->order,
            'status' => $request->status,
            'creator_id' => auth()->id(),
        ]);
    }

    public function updateManagementCategory($request, $id)
    {
        MCategory::findOrFail($id)
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
                'list_type_id' => $request->list_type_id,
                'parent_id' => $request->parent_id,
                'image' => $request->image,
                'order' => $request->order,
                'status' => $request->status,
                'modifier_id' => auth()->id(),
            ]);
    }

    public function deleteManagementCategory($id)
    {
        MCategory::findOrFail($id)
            ->delete();
    }
}
