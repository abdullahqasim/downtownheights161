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
        Schema::create('varitions', function (Blueprint $table) {
            $table->id();
            $table->Integer('product_id');
            $table->text('variation')->nullable();
            $table->string('inside_mount')->nullable();
            $table->string('outside_mount')->nullable();
            $table->string('title1')->nullable();
            $table->string('image1')->nullable();
    
           
            
            
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
        Schema::dropIfExists('varitions');
    }
};
