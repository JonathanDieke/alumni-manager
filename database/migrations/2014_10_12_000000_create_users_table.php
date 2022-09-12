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
        Schema::create('alumni', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->enum('gender', ['male', 'female']);
            // $table->timestamp('email_verified_at')->nullable();
            $table->date('birthdate');
            $table->string('job');
            $table->string('company');
            $table->string('promotion');
            $table->string('tel');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumni');
    }
};
