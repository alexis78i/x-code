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
        Schema::create('streets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('postcode_id')->index();
            $table->foreign('postcode_id')->references('id')->on('postcodes')->onDelete('cascade');

            $table->string('slug')->unique();

            $table->string('name');
            $table->string('name_tgf');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('streets');
    }
};
