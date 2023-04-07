<?php

use App\Models\User\UserToken;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_token', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->enum('type', [UserToken::TYPE_REGISTER, UserToken::TYPE_PASSWORD_RESET]);
            $table->string('token');
            $table->boolean('is_used');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_token');
    }
};
