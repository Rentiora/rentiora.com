<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id('availability_id');
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
            $table->enum('status', ['available', 'booked', 'in_maintenance'])->default('available');
            $table->date('available_from');
            $table->date('available_until');
            $table->timestamps();
        });
    }
  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
