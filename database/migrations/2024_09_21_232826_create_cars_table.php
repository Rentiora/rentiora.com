<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id('car_id');
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->unsignedBigInteger('availability_id');
            $table->text('description');
            $table->decimal('price_per_day', 8, 2);
            $table->string('image_url');
            $table->timestamps();

            $table->foreign('availability_id')->references('id')->on('availability');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};