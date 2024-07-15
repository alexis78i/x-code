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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->index();

            $table->unsignedBigInteger('postcode_id')->index();
            $table->foreign('postcode_id')->references('id')->on('postcodes')->onDelete('cascade');

            $table->unsignedBigInteger('street_id')->index();
            $table->foreign('street_id')->references('id')->on('streets')->onDelete('cascade');

            $table->string('house_number');
            $table->decimal('year_of_build', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
