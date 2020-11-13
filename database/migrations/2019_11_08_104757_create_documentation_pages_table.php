<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentationPagesTable extends Migration
{
    public function up()
    {
        Schema::create('documentation_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->longText('content');
            $table->timestamps();
        });
    }
}
