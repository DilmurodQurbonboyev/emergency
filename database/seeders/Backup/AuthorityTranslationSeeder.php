<?php

namespace Database\Seeders\Backup;

use File;
use Illuminate\Database\Seeder;
use App\Models\AuthorityTranslation;

class AuthorityTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/authority_translations.json");
        $authorityTrans = json_decode($json);

        foreach ($authorityTrans as $authority) {
            AuthorityTranslation::query()->create([
                "id" => $authority->id,
                "authority_id" => $authority->authority_id,
                "title" => $authority->title,
                "locale" => $authority->locale,
            ]);
        }
    }
}
