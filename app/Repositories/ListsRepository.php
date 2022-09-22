<?php

namespace App\Repositories;

use App\Interfaces\ListsRepositoryInterface;
use App\Models\Lists;
use Illuminate\Database\Eloquent\Model;

class ListsRepository extends Model implements ListsRepositoryInterface
{


    public function getById($id)
    {
        return Lists::findOrFail($id);
    }

    public function saveList($request, $list)
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
                $slug = $list->makeSlug($item);
                break;
            }
        }

        Lists::create(
            [
                'oz' => [
                    'title' => $request->title_oz,
                    'description' => $request->description_oz,
                    'content' => $request->content_oz,
                    'pdf_title' => $request->pdf_title_oz,
                    'pdf' => $request->pdf_oz,
                    'pdf_title_2' => $request->pdf_title_2_oz,
                    'pdf_2' => $request->pdf_2_oz,
                ],
                'uz' => [
                    'title' => $request->title_uz,
                    'description' => $request->description_uz,
                    'content' => $request->content_uz,
                    'pdf_title' => $request->pdf_title_uz,
                    'pdf' => $request->pdf_uz,
                    'pdf_title_2' => $request->pdf_title_2_uz,
                    'pdf_2' => $request->pdf_2_uz,
                ],
                'ru' => [
                    'title' => $request->title_ru,
                    'description' => $request->description_ru,
                    'content' => $request->content_ru,
                    'pdf_title' => $request->pdf_title_ru,
                    'pdf' => $request->pdf_ru,
                    'pdf_title_2' => $request->pdf_title_2_ru,
                    'pdf_2' => $request->pdf_2_ru,
                ],
                'en' => [
                    'title' => $request->title_en,
                    'description' => $request->description_en,
                    'content' => $request->content_en,
                    'pdf_title' => $request->pdf_title_en,
                    'pdf' => $request->pdf_en,
                    'pdf_title_2' => $request->pdf_title_2_en,
                    'pdf_2' => $request->pdf_2_en,
                ],
                'list_type_id' => $request->list_type_id,
                'lists_category_id' => $request->lists_category_id,
                'slug' => $slug,
                'image' => $request->image,
                'anons_image' => $request->anons_image,
                'body_image' => $request->body_image,
                'show_on_slider' => $request->show_on_slider,
                'pdf_type' => $request->pdf_type,
                'video_code' => $request->video_code,
                'video' => $request->video,
                'media_type' => $request->media_type,
                'link' => $request->link,
                'link_type' => $request->link_type,
                'parent_id' => $request->parent_id,
                'right_menu' => $request->right_menu,
                'date' => $request->date,
                'order' => $request->order,
                'status' => $request->status,
                'creator_id' => auth()->user()->id,
            ]
        );
    }

    public function updateList($request, $id)
    {
        $lists = Lists::query()->findOrFail($id)->update(
            [
                'oz' => [
                    'title' => $request->title_oz,
                    'description' => $request->description_oz,
                    'content' => $request->content_oz,
                    'pdf_title' => $request->pdf_title_oz,
                    'pdf' => $request->pdf_oz,
                    'pdf_title_2' => $request->pdf_title_2_oz,
                    'pdf_2' => $request->pdf_2_oz,
                ],
                'uz' => [
                    'title' => $request->title_uz,
                    'description' => $request->description_uz,
                    'content' => $request->content_uz,
                    'pdf_title' => $request->pdf_title_uz,
                    'pdf' => $request->pdf_uz,
                    'pdf_title_2' => $request->pdf_title_2_uz,
                    'pdf_2' => $request->pdf_2_uz,
                ],
                'ru' => [
                    'title' => $request->title_ru,
                    'description' => $request->description_ru,
                    'content' => $request->content_ru,
                    'pdf_title' => $request->pdf_title_ru,
                    'pdf' => $request->pdf_ru,
                    'pdf_title_2' => $request->pdf_title_2_ru,
                    'pdf_2' => $request->pdf_2_ru,
                ],
                'en' => [
                    'title' => $request->title_en,
                    'description' => $request->description_en,
                    'content' => $request->content_en,
                    'pdf_title' => $request->pdf_title_en,
                    'pdf' => $request->pdf_en,
                    'pdf_title_2' => $request->pdf_title_2_en,
                    'pdf_2' => $request->pdf_2_en,
                ],
                'list_type_id' => $request->list_type_id,
                'lists_category_id' => $request->lists_category_id,
                'image' => $request->image,
                'anons_image' => $request->anons_image,
                'body_image' => $request->body_image,
                'show_on_slider' => $request->show_on_slider,
                'pdf_type' => $request->pdf_type,
                'video_code' => $request->video_code,
                'video' => $request->video,
                'media_type' => $request->media_type,
                'link' => $request->link,
                'link_type' => $request->link_type,
                'parent_id' => $request->parent_id,
                'right_menu' => $request->right_menu,
                'date' => $request->date,
                'order' => $request->order,
                'status' => $request->status,
                'modifier_id' => auth()->user()->id,
            ]
        );
    }

    public function deleteList($id)
    {
        return Lists::findOrFail($id)->delete();
    }
}
