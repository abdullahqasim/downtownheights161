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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            // $table->string('price');
            $table->string('image');
            $table->string('product_type');
            $table->integer('c_id');
           // $table->enum('product_type', ['Control Types', 'Styles', 'Headrails', 'Light Controls', 'Light/Privacy', 'Vane Sizes'])->default('Normal');
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
        Schema::dropIfExists('products');
    }
};
