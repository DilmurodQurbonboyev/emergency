<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MenuCategoryTranslation;
use Database\Seeders\Backup\AuthLogSeeder;
use Database\Seeders\Backup\AuthoritySeeder;
use Database\Seeders\Backup\AuthorityTranslationSeeder;
use Database\Seeders\Backup\ContactSeeder;
use Database\Seeders\Backup\ContactTranslationSeeder;
use Database\Seeders\Backup\ListCategorySeeder;
use Database\Seeders\Backup\ListCategoryTranslationSeeder;
use Database\Seeders\Backup\ListSeeder;
use Database\Seeders\Backup\ListsTranslationSeeder;
use Database\Seeders\Backup\ManagementSeeder;
use Database\Seeders\Backup\ManagementTranslationSeeder;
use Database\Seeders\Backup\MCategorySeeder;
use Database\Seeders\Backup\MCategoryTranslationSeeder;
use Database\Seeders\Backup\MenusCategorySeeder;
use Database\Seeders\Backup\MenusCategoryTranslationSeeder;
use Database\Seeders\Backup\MenuSeeder;
use Database\Seeders\Backup\MenuTranslationSeeder;
use Database\Seeders\Backup\MessageSeeder;
use Database\Seeders\Backup\MessageTranslationSeeder;
use Database\Seeders\Backup\RegionSeeder;
use Database\Seeders\Backup\UserDataSeeder;
use Database\Seeders\Backup\UserRoleLinkSeeder;
use Database\Seeders\Backup\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(UserDataSeeder::class);
        $this->call(AuthoritySeeder::class);
        $this->call(AuthorityTranslationSeeder::class);
        $this->call(UserRoleLinkSeeder::class);
        $this->call(ListTypeSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(ContactTranslationSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(MenusCategorySeeder::class);
        $this->call(MenusCategoryTranslationSeeder::class);
        $this->call(ListCategorySeeder::class);
        $this->call(ListCategoryTranslationSeeder::class);
        $this->call(MCategorySeeder::class);
        $this->call(MCategoryTranslationSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MenuTranslationSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(MessageTranslationSeeder::class);
        $this->call(ListSeeder::class);
        $this->call(ListsTranslationSeeder::class);
        $this->call(ManagementSeeder::class);
        $this->call(ManagementTranslationSeeder::class);
    }
}
