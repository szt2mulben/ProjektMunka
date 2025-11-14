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
    Schema::create('laptops', function (Blueprint $table) {
        $table->id();
        $table->string('gyarto');
        $table->string('tipus');
        $table->string('kijelzo');    
        $table->integer('memoria');    
        $table->integer('merevlemez'); 
        $table->string('videovezerlo')->nullable();
        $table->integer('ar');         
        $table->unsignedBigInteger('processor_id');
        $table->unsignedBigInteger('operating_system_id');
        $table->integer('db');         

        $table->foreign('processor_id')->references('id')->on('processors')->cascadeOnDelete();
        $table->foreign('operating_system_id')->references('id')->on('operating_systems')->cascadeOnDelete();

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
