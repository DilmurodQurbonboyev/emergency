<?php

namespace Database\Seeders\Backup;

use File;
use App\Models\MCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/m_categories.json");
        $managements = json_decode($json);

        foreach ($managements as $management) {
            DB::table('m_categories')->insert([
                "id" => $management->id,
                "list_type_id" => $management->list_type_id,
                "parent_id" => $management->parent_id,
                "slug" => $management->slug,
                "image" => $management->image,
                "status" => $management->status,
                "creator_id" => $management->creator_id,
                "created_at" => $management->created_at,
                "updated_at" => $management->updated_at
            ]);
        }
    }
}
