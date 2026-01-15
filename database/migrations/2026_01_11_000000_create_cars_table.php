<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('Name');
            $blueprint->integer('Cylinders')->nullable();
            $blueprint->double('Miles_per_Gallon')->nullable();
            $blueprint->double('Displacement')->nullable();
            $blueprint->integer('Horsepower')->nullable();
            $blueprint->double('Weight_in_lbs')->nullable();
            $blueprint->double('Acceleration')->nullable();
            $blueprint->date('Year')->nullable();
            $blueprint->string('Origin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
