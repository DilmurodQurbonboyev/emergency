<?php

namespace Database\Seeders\Backup;

use File;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/users.json");
        $users = json_decode($json);

        foreach ($users as $user) {
            User::query()->create([
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "email_verified_at" => $user->email_verified_at,
                "password" => $user->password,
                "remember_token" => $user->remember_token,
                "created_at" => $user->created_at,
                "updated_at" => $user->updated_at
            ]);
        }
    }
}
