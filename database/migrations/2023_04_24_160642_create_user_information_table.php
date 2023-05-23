<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->text('avatar')->default('default_avatar.jpg');
            $table->text('institute')->nullable();
            $table->text('course')->nullable();
            $table->text('department')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_information');
    }
};
