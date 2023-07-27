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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->Integer('product_id')->nallable();
            $table->string('product_name')->nallable(); 
            $table->string('verity')->nallable(); 
            $table->string('product_description')->nallable();
            $table->string('price')->nallable(); 
            $table->Integer('width')->nallable();
            $table->Integer('hieght')->nallable();

            $table->string('width_friction')->nallable(); 
            $table->string('hieght_friction')->nallable();
            $table->string('mount')->nallable(); 
            $table->string('valancestyle')->nallable();
            $table->string('cord')->nallable();
            $table->string('tilt')->nallable(); 
            $table->string('personalize')->nallable();
            $table->string('room_type')->nallable(); 
            $table->string('window_description')->nallable();
            
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
        Schema::dropIfExists('orders');
    }
};
