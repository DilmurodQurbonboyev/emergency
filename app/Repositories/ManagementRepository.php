<?php

namespace App\Repositories;

use App\Interfaces\ManagementRepositoryInterface;
use App\Models\Management;
use Illuminate\Database\Eloquent\Model;


class ManagementRepository extends Model implements ManagementRepositoryInterface
{

    public function getById($id)
    {
        return Management::query()
            ->findOrFail($id);
    }

    public function saveManagement($request)
    {
        Management::query()
            ->create([
                'oz' => [
                    'title' => $request->title_oz,
                    'leader' => $request->leader_oz,
                    'title2' => $request->title2_oz,
                    'reception' => $request->reception_oz,
                    'address' => $request->address_oz,
                    'biography' => $request->biography_oz,
                    'description' => $request->description_oz,
                    'content' => $request->content_oz,
                    'pdf_title' => $request->pdf_title_oz,
                    'pdf' => $request->pdf_oz,
                ],
                'uz' => [
                    'title' => $request->title_uz,
                    'leader' => $request->leader_uz,
                    'title2' => $request->title2_uz,
                    'reception' => $request->reception_uz,
                    'address' => $request->address_uz,
                    'biography' => $request->biography_uz,
                    'description' => $request->description_uz,
                    'content' => $request->content_uz,
                    'pdf_title' => $request->pdf_title_uz,
                    'pdf' => $request->pdf_uz,
                ],
                'ru' => [
                    'title' => $request->title_ru,
                    'leader' => $request->leader_ru,
                    'title2' => $request->title2_ru,
                    'reception' => $request->reception_ru,
                    'address' => $request->address_ru,
                    'biography' => $request->biography_ru,
                    'description' => $request->description_ru,
                    'content' => $request->content_ru,
                    'pdf_title' => $request->pdf_title_ru,
                    'pdf' => $request->pdf_ru,
                ],
                'en' => [
                    'title' => $request->title_en,
                    'leader' => $request->leader_en,
                    'title2' => $request->title2_en,
                    'reception' => $request->reception_en,
                    'address' => $request->address_en,
                    'biography' => $request->biography_en,
                    'description' => $request->description_en,
                    'content' => $request->content_en,
                    'pdf_title' => $request->pdf_title_en,
                    'pdf' => $request->pdf_en,
                ],
                'list_type_id' => $request->list_type_id,
                'image' => $request->image,
                'anons_image' => $request->anons_image,
                'region_id' => $request->region_id,
                'phone' => $request->phone,
                'email' => $request->email,
                'fax' => $request->fax,
                'main' => $request->main,
                'm_category_id' => $request->m_category_id,
                'order' => $request->order,
                'status' => $request->status,
                'creator_id' => auth()->id(),
            ]);
    }

    public function updateManagement($request, $id)
    {
        Management::query()
            ->findOrFail($id)
            ->update([
                'oz' => [
                    'title' => $request->title_oz,
                    'leader' => $request->leader_oz,
                    'title2' => $request->title2_oz,
                    'reception' => $request->reception_oz,
                    'address' => $request->address_oz,
                    'biography' => $request->biography_oz,
                    'description' => $request->description_oz,
                    'content' => $request->content_oz,
                    'pdf_title' => $request->pdf_title_oz,
                    'pdf' => $request->pdf_oz,
                ],
                'uz' => [
                    'title' => $request->title_uz,
                    'leader' => $request->leader_uz,
                    'title2' => $request->title2_uz,
                    'reception' => $request->reception_uz,
                    'address' => $request->address_uz,
                    'biography' => $request->biography_uz,
                    'description' => $request->description_uz,
                    'content' => $request->content_uz,
                    'pdf_title' => $request->pdf_title_uz,
                    'pdf' => $request->pdf_uz,
                ],
                'ru' => [
                    'title' => $request->title_ru,
                    'leader' => $request->leader_ru,
                    'title2' => $request->title2_ru,
                    'reception' => $request->reception_ru,
                    'address' => $request->address_ru,
                    'biography' => $request->biography_ru,
                    'description' => $request->description_ru,
                    'content' => $request->content_ru,
                    'pdf_title' => $request->pdf_title_ru,
                    'pdf' => $request->pdf_ru,
                ],
                'en' => [
                    'title' => $request->title_en,
                    'leader' => $request->leader_en,
                    'title2' => $request->title2_en,
                    'reception' => $request->reception_en,
                    'address' => $request->address_en,
                    'biography' => $request->biography_en,
                    'description' => $request->description_en,
                    'content' => $request->content_en,
                    'pdf_title' => $request->pdf_title_en,
                    'pdf' => $request->pdf_en,
                ],
                'list_type_id' => $request->list_type_id,
                'image' => $request->image,
                'anons_image' => $request->anons_image,
                'phone' => $request->phone,
                'email' => $request->email,
                'fax' => $request->fax,
                'region_id' => $request->region_id,
                'main' => $request->main,
                'm_category_id' => $request->m_category_id,
                'order' => $request->order,
                'status' => $request->status,
                'modifier_id' => auth()->id(),
            ]);
    }

    public function deleteManagement($id)
    {
        Management::query()
            ->findOrFail($id)
            ->delete();
    }
}
