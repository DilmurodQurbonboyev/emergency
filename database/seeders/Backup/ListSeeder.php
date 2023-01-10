<?php

namespace Database\Seeders\Backup;

use Illuminate\Support\Facades\File;

use App\Models\Lists;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/backups/lists.json");
        $lists = json_decode($json);

        foreach ($lists as $list) {
            DB::table('lists')->insert([
                "id" => $list->id,
                "list_type_id" => $list->list_type_id,
                "lists_category_id" => $list->lists_category_id,
                "slug" => $list->slug,
                "image" => $list->image,
                "anons_image" => $list->anons_image,
                "body_image" => $list->body_image,
                "show_on_slider" => $list->show_on_slider,
                "pdf_type" => $list->pdf_type,
                "video_code" => $list->video_code,
                "video" => $list->video,
                "media_type" => $list->media_type,
                "link" => $list->link,
                "date_register" => $list->date_register,
                "link_type" => $list->link_type,
                "parent_id" => $list->parent_id,
                "right_menu" => $list->right_menu,
                "date" => $list->date,
                "order" => $list->order,
                "status" => $list->status,
                "creator_id" => $list->creator_id,
                "modifier_id" => $list->modifier_id,
                "created_at" => $list->created_at,
                "updated_at" => $list->updated_at
            ]);
        }
    }
}
