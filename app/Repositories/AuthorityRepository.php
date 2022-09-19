<?php

namespace App\Repositories;

use App\Interfaces\AuthorityRepositoryInterface;
use App\Models\Authority;
use Illuminate\Database\Eloquent\Model;

class AuthorityRepository extends Model implements AuthorityRepositoryInterface
{
    public function getById($id)
    {
        return Authority::query()->findOrFail($id);
    }

    public function saveAuthority($request)
    {
        Authority::create([
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
            'code' => $request->code,
            'status' => $request->status,
            'creator_id' => auth()->user()->id,
        ]);
    }

    public function updateAuthority($request, $id)
    {
        Authority::findOrFail($id)
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
                'code' => $request->code,
                'status' => $request->status,
                'modifier_id' => auth()->user()->id,
            ]);
    }


    public function deleteAuthority($id)
    {
        return Authority::query()->findOrFail($id)
            ->delete();
    }
}
