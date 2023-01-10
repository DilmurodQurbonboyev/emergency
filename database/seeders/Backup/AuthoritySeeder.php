<?php

namespace Database\Seeders\Backup;

use Illuminate\Support\Facades\File;
use App\Models\Authority;
use Illuminate\Database\Seeder;

class AuthoritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/authorities.json");
        $authorities = json_decode($json);
        foreach ($authorities as $authority) {
            Authority::query()->create([
                "id" => $authority->id,
                "code" => $authority->code,
                "status" => $authority->status,
                "creator_id" => $authority->creator_id,
                "modifier_id" => $authority->modifier_id,
                "created_at" => $authority->created_at,
                "updated_at" => $authority->updated_at
            ]);
        }
    }
}
