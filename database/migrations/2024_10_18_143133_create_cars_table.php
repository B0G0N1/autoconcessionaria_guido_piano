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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->string('model', 30);
            $table->year('year');
            $table->string('color', 15);
            $table->decimal('price', 10, 2);
            $table->string('engine', 30);
            $table->smallInteger('horsepower');
            $table->tinyInteger('doors');
            $table->mediumInteger('km');
            $table->boolean('used')->default(false);
            $table->string('thumb')->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
