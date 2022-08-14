<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_formations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('school');
            $table->string('field');
            $table->date('start_year');
            $table->date('end_year');

            $table->foreignUuid('user_id');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_formations');
    }
};
