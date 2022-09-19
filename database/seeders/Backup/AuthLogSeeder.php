<?php

namespace Database\Seeders\Backup;

use App\Models\AuthLog;
use File;
use Illuminate\Database\Seeder;

class AuthLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/authentication_logs.json");
        $authenticationLogs = json_decode($json);
        foreach ($authenticationLogs as $authenticationLog) {
            AuthLog::query()->create([
                "id" => $authenticationLog->id,
                "user_id" => $authenticationLog->user_id,
                "authority_id" => $authenticationLog->authority_id,
                "description" => $authenticationLog->description,
                "created_at" => $authenticationLog->created_at,
                "updated_at" => $authenticationLog->updated_at,
            ]);
        }
    }
}
