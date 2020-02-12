<?php

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
            ->call(EmailListSeeder::class)
            ->call(DocumentationSeeder::class)
            ->call(VideoSeeder::class);
    }
}
