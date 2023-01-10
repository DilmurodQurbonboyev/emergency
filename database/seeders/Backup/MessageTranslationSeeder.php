<?php

namespace Database\Seeders\Backup;

use Illuminate\Support\Facades\File;

use Illuminate\Database\Seeder;
use App\Models\MessageTranslation;

class MessageTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/message_translations.json");
        $messages = json_decode($json);

        foreach ($messages as $message) {
            MessageTranslation::query()->create([
                "id" => $message->id,
                "message_id" => $message->message_id,
                "title" => $message->title,
                "locale" => $message->locale,
            ]);
        }
    }
}
