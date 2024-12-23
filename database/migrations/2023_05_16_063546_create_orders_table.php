<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    /**
     * Run the migrations.
     */
    
    public function up(): void {
        // Check if the table already exists
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->string('orderId')->primary();
                $table->float('totalAmount');
                $table->string('cID');
                $table->string('shipNum');
                $table->string('consigneeName');
                $table->string('consigneeNum')->nullable();
                //$table->string('origin');
                //$table->string('destination');
                $table->string('origin')->default('CHOOSE ORIGIN'); // Optional default
                $table->string('destination')->default('CHOOSE DESTINATION');

                $table->string('cargoNum')->default(0);
                $table->string('voyageNum')->nullable();
                $table->string('containerNum')->nullable();
                //$table->string('value')->nullable();
                $table->string('check')->nullable();
                $table->string('status')->default('inProgress'); // Add status column once

                $table->string('orderCreated');
                $table->string('value')->nullable();
                $table->string('mark')->nullable();

                $table->string('OR')->nullable();
                $table->string('AR')->nullable();

                $table->timestamps();
                $table->index('cargoNum');
            });
        } else {
            Schema::table('orders', function (Blueprint $table) {
                // Add new columns if they do not already exist
                if (!Schema::hasColumn('orders', 'status')) {
                    $table->string('status')->default('inProgress');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void {
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                // Remove new columns if they exist
                if (Schema::hasColumn('orders', 'status')) {
                    $table->dropColumn('status');
                }

                // Re-add the individual status columns if rolling back
                $columns = ['inProgress','TRANSFER', 'CHARTERED', 'CANCEL', 'OFFLOAD', 'TOPLOAD', 'SHIP', 'COMPLETE'];
                foreach ($columns as $column) {
                    if (!Schema::hasColumn('orders', $column)) {
                        $table->string($column)->default('0');
                    }
                }
            });
        }
    }
};