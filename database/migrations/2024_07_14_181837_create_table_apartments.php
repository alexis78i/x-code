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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->bigInteger('legal_number')->unique();

            $table->unsignedBigInteger('house_id')->index()->nullable();
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');

            $table->string('apartment_number', 25)->nullable();
            $table->string('address');
            $table->decimal('evaluation', 15, 0);
            $table->decimal('size', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
