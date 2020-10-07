<?php

use App\Models\Release;
use Illuminate\Database\Seeder;

class ReleaseSeeder extends Seeder
{
    public function run()
    {
        Release::factory()->create();
    }
}
