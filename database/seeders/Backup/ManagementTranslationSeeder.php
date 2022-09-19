<?php

namespace Database\Seeders\Backup;

use File;
use Illuminate\Database\Seeder;
use App\Models\ManagementTranslation;

class ManagementTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/management_translations.json");
        $managementTrans = json_decode($json);

        foreach ($managementTrans as $management) {
            ManagementTranslation::query()->create([
                "id" => $management->id,
                "management_id" => $management->management_id,
                "title" => $management->title,
                "leader" => $management->leader,
                "reception" => $management->reception,
                "address" => $management->address,
                "biography" => $management->biography,
                "description" => $management->description,
                "content" => $management->content,
                "deleted_at" => $management->deleted_at,
                "locale" => $management->locale,
                "created_at" => $management->created_at,
                "updated_at" => $management->updated_at
            ]);
        }
    }
}
