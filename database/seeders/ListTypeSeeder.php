<?php

namespace Database\Seeders;

use App\Models\ListType;
use App\Models\ListTypeTranslation;
use Illuminate\Database\Seeder;

class ListTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listTypes = [
            'news',
            'posters',
            'answers',
            'links',
            'pages',
            'useful',
            'photos',
            'videos',
            'events',
            'managements',
        ];
        foreach ($listTypes as $type) {
            ListType::query()->create([
                'creator_id' => 1,
            ]);
        }
    }
}
