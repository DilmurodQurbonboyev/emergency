<?php

namespace Database\Seeders\Backup;

use App\Models\AuthLog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class AuthLogSeeder extends Seeder
{
    public function run()
    {
        $json = File::get("database/backups/auth_logs.json");
        $authenticationLogs = json_decode($json);
        foreach ($authenticationLogs as $authenticationLog) {
            AuthLog::query()->create([
                "id" => $authenticationLog->id,
                "user_id" => $authenticationLog->user_id,
                "authority_id" => $authenticationLog->authority_id,
                "user_ip" => $authenticationLog->user_ip,
                "description" => $authenticationLog->description,
                "created_at" => $authenticationLog->created_at,
                "updated_at" => $authenticationLog->updated_at,
            ]);
        }
    }
}
