<?php

namespace Database\Seeders\Backup;

use Illuminate\Support\Facades\File;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/management.json");
        $managements = json_decode($json);

        foreach ($managements as $management) {
            DB::table('management')->insert([
                "id" => $management->id,
                "list_type_id" => $management->list_type_id,
                "m_category_id" => $management->m_category_id,
                "slug" => $management->slug,
                "image" => $management->image,
                "region_id" => $management->region_id,
                "anons_image" => $management->anons_image,
                "phone" => $management->phone,
                "email" => $management->email,
                "main" => $management->main,
                "fax" => $management->fax,
                "order" => $management->order,
                "status" => $management->status,
                "deleted_at" => $management->deleted_at,
                "creator_id" => $management->creator_id,
                "created_at" => $management->created_at,
                "updated_at" => $management->updated_at
            ]);
        }
    }
}
