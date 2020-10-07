<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this
            ->call(UserSeeder::class)
            ->call(ReleaseSeeder::class)
            ->call(ProductSeeder::class)
            ->call(LicenseSeeder::class)
            ->call(DocumentationSeeder::class)
            ->call(VideoSeeder::class);
    }
}
