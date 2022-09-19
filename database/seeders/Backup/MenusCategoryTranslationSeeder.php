<?php

namespace Database\Seeders\Backup;

use File;
use Illuminate\Database\Seeder;
use App\Models\MenusCategoryTranslation;

class MenusCategoryTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/menus_category_translations.json");
        $menusCategoriesTrans = json_decode($json);

        foreach ($menusCategoriesTrans as $menusCategoryTrans) {
            MenusCategoryTranslation::query()->create([
                "id" => $menusCategoryTrans->id,
                "menus_category_id" => $menusCategoryTrans->menus_category_id,
                "title" => $menusCategoryTrans->title,
                "locale" => $menusCategoryTrans->locale,
            ]);
        }
    }
}
