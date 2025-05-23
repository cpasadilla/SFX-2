<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    /**
     * Run the migrations.
     */
    
    public function up(): void {
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category');
            $table->string('itemName');

            //$table->float('price');
            //$table->decimal('length');
            //$table->decimal('width');
            //$table->decimal('height');
            //$table->string('multiplier')->default('default_value')->nullable();

            $table->string(column: 'unit')->nullable();
            $table->decimal('price', 10, 2)->change(); // Change to DECIMAL with 10 digits total and 2 decimal places
            $table->decimal('length', 8, 3)->nullable();
            $table->decimal('width', 8, 3)->nullable();
            $table->decimal('height', 8, 3)->nullable();
            $table->decimal('multiplier', 10, 2)->change(); // Same for multiplier
            
            $table->timestamps();
            $table->index('category');
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void {
        Schema::dropIfExists('price_lists');
    }
};