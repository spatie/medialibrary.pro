<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        foreach (['freek', 'willem'] as $name) {
            User::factory()->create([
                'email' => "{$name}@spatie.be",
                'admin' => 1,
            ]);
        }
    }
}
