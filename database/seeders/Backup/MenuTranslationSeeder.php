<?php

namespace Database\Seeders\Backup;

use File;
use Illuminate\Database\Seeder;
use App\Models\MenuTranslation;

class MenuTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/menu_translations.json");
        $menusTrans = json_decode($json);

        foreach ($menusTrans as $menusCategoryTrans) {
            MenuTranslation::query()->create([
                "id" => $menusCategoryTrans->id,
                "menu_id" => $menusCategoryTrans->menu_id,
                "title" => $menusCategoryTrans->title,
                "locale" => $menusCategoryTrans->locale,
            ]);
        }
    }
}
