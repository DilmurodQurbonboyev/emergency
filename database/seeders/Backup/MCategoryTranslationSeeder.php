<?php

namespace Database\Seeders\Backup;

use File;
use Illuminate\Database\Seeder;
use App\Models\MCategoryTranslation;

class MCategoryTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/m_category_translations.json");
        $managements = json_decode($json);

        foreach ($managements as $management) {
            MCategoryTranslation::query()->create([
                "id" => $management->id,
                "m_category_id" => $management->m_category_id,
                "title" => $management->title,
                "locale" => $management->locale,
                "created_at" => $management->created_at,
                "updated_at" => $management->updated_at
            ]);
        }
    }
}
