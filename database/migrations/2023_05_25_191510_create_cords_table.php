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
        Schema::create('cords', function (Blueprint $table) {
            $table->id();
            $table->string('cord_image')->nullable();
            $table->string('cord_name')->nullable();
            $table->integer('v_id')->nullable();
            $table->integer('p_id')->nullable();
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
        Schema::dropIfExists('cords');
    }
};
