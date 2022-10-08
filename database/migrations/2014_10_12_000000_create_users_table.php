<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('facebook_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->default(' ');
            $table->string('country')->default('Morocco');
            $table->string('image')->default('default.png');
            $table->integer('level')->default(1);
            $table->string('xp')->default('000.00');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
