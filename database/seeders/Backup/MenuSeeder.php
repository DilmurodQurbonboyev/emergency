<?php

namespace Database\Seeders\Backup;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/menus.json");
        $menusCategoriesTrans = json_decode($json);

        foreach ($menusCategoriesTrans as $menusCategoryTrans) {
            Menu::query()->create([
                "id" => $menusCategoryTrans->id,
                "link" => $menusCategoryTrans->link,
                "link_type" => $menusCategoryTrans->link_type,
                "image" => $menusCategoryTrans->image,
                "parent_id" => $menusCategoryTrans->parent_id,
                "menus_category_id" => $menusCategoryTrans->menus_category_id,
                "status" => $menusCategoryTrans->status,
                "order" => $menusCategoryTrans->order,
                "creator_id" => $menusCategoryTrans->creator_id,
                "modifier_id" => $menusCategoryTrans->modifier_id,
                "deleted_at" => $menusCategoryTrans->deleted_at,
                "created_at" => $menusCategoryTrans->created_at,
                "updated_at" => $menusCategoryTrans->updated_at,
            ]);
        }
    }
}
