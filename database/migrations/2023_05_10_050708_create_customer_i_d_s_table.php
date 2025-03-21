<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    /**
     * Run the migrations.
     */
    
    public function up(): void {
        Schema::create('customer_i_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('cID');
            $table->string('fName');
            $table->string('lName');
            $table->string('phoneNum')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void {
        Schema::dropIfExists('customer_i_d_s');
    }
};