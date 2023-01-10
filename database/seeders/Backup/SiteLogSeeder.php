<?php

namespace Database\Seeders\Backup;

use App\Models\SiteLog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SiteLogSeeder extends Seeder
{
    public function run()
    {
        $json = File::get("database/backups/site_logs.json");
        $siteLogs = json_decode($json);
        foreach ($siteLogs as $siteLog) {
            SiteLog::query()->create([
                "id" =>  $siteLog->id,
                "model" =>  $siteLog->model,
                "type" =>  $siteLog->type,
                "row_id" =>  $siteLog->row_id,
                "user_id" =>  $siteLog->user_id,
                "authority_id" =>  $siteLog->authority_id,
                "user_ip" =>  $siteLog->user_ip,
                "url" =>  $siteLog->url,
                "action" =>  $siteLog->action,
                "user_agent" =>  $siteLog->user_agent,
                "created_at" =>  $siteLog->created_at,
                "updated_at" =>  $siteLog->updated_at,
            ]);
        }
    }
}
