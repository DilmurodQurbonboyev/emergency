<?php

namespace Database\Seeders\Backup;

use Illuminate\Support\Facades\File;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/contacts.json");
        $contacts = json_decode($json);

        foreach ($contacts as $contact) {
            Contact::query()->create([
                "id" => $contact->id,
                "phone" => $contact->phone,
                "email" => $contact->email,
                "longitude" => $contact->longitude,
                "latitude" => $contact->latitude,
                "created_at" => $contact->created_at,
                "updated_at" => $contact->updated_at
            ]);
        }
    }
}
