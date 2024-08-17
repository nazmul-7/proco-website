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
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('isFinancialMaterial');
            $table->string('financialMaterial');
            $table->string('fuelEconomy');
            $table->integer('fleetFuelEconomyAverage');
            $table->string('vehiclesSoldHybrid');
            $table->string('vehiclesSoldPlugIn');
            $table->string('vehiclesSoldZeroEmission');
            $table->string('fleetFuelEconomyStrategies');
            $table->integer('vehiclesManufactured');
            $table->integer('vehiclesSold');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informations');
    }
};
