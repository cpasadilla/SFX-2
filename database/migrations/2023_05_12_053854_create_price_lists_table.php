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
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category');
            $table->string('itemName');
            $table->float('price');

            $table->decimal('length');
    $table->decimal('width');
    $table->decimal('height');
            $table->string('multiplier')->default('default_value')->nullable();


            $table->timestamps();

            $table->index('category');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_lists');
    }
};
