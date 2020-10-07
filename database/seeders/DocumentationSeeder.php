<?php

namespace Database\Seeders;

use App\Console\UpdateDocumentationCommand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DocumentationSeeder extends Seeder
{
    public function run()
    {
        Artisan::call(UpdateDocumentationCommand::class);
    }
}
