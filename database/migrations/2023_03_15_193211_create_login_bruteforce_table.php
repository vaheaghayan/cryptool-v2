<?php

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
        Schema::create('login_bruteforce', function (Blueprint $table) {
            $table->string('remote_addr');
            $table->string('email');
            $table->string('ip_hash');
            $table->timestamp('date')->nullable();
            $table->integer('attempts_count')->unsigned();
            $table->index('ip_hash');
            $table->index(['ip_hash', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_bruteforce');
    }
};
