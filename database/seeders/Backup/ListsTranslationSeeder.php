<?php

namespace Database\Seeders\Backup;

use File;
use Illuminate\Database\Seeder;
use App\Models\ListsTranslation;

class ListsTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/lists_translations.json");
        $lists = json_decode($json);

        foreach ($lists as $list) {
            ListsTranslation::query()->create([
                "id" => $list->id,
                "lists_id" => $list->lists_id,
                "title" => $list->title,
                "description" => $list->description,
                "content" => $list->content,
                "pdf_title" => $list->pdf_title,
                "pdf" => $list->pdf,
                "pdf_title_2" => $list->pdf_title_2,
                "pdf_2" => $list->pdf_2,
                "locale" => $list->locale,
            ]);
        }
    }
}
