<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');


            $table->string('domain')->nullable();
            $table->string('key');

            $table->integer('mailcoach_download_count')->default(0);
            $table->integer('composer_auth_count')->default(0);

            $table->timestamp('expires_at');
            $table->timestamp('expiration_warning_mail_sent_at')->nullable();
            $table->timestamp('expiration_mail_sent_at')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }
}
