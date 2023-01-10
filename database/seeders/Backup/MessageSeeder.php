<?php

namespace Database\Seeders\Backup;

use Illuminate\Support\Facades\File;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/messages.json");
        $messages = json_decode($json);

        foreach ($messages as $message) {
            Message::query()->create([
                "id" => $message->id,
                "key" => $message->key,
                "created_at" => $message->created_at,
                "updated_at" => $message->updated_at
            ]);
        }
    }
}
