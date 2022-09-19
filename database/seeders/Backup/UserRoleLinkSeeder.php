<?php

namespace Database\Seeders\Backup;

use File;
use App\Models\UserRoleLink;
use Illuminate\Database\Seeder;

class UserRoleLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/user_role_links.json");
        $userRoleLinks = json_decode($json);

        foreach ($userRoleLinks as $userRoleLink) {
            UserRoleLink::query()->create([
                "authority_id" => $userRoleLink->authority_id,
                "user_id" => $userRoleLink->user_id,
            ]);
        }
    }
}
