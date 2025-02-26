<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    /**
     * Run the migrations.
     */
    
    public function up(): void {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string('itemName');
            $table->string(column: 'unit');
            $table->integer('quantity');            
            $table->string('price');
            $table->string('total');            
            $table->string('orderId');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void {
        Schema::dropIfExists('parcels');
    }
};