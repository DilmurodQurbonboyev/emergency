<?php

namespace Database\Seeders\Backup;

use Illuminate\Support\Facades\File;

use Illuminate\Database\Seeder;
use App\Models\ContactTranslation;

class ContactTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/contact_translations.json");
        $contacts = json_decode($json);

        foreach ($contacts as $contact) {
            ContactTranslation::query()->create([
                "id" => $contact->id,
                "contact_id" => $contact->contact_id,
                "address" => $contact->address,
                "working_time" => $contact->working_time,
                "reception" => $contact->reception,
                "locale" => $contact->locale,
            ]);
        }
    }
}
