<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    /**
     * Run the migrations.
     */
    
    public function up(): void {
        Schema::table('orders', function (Blueprint $table) {
            // Check for each column's existence before dropping
            $columns = ['IN PROGRESS','TRANSFER', 'CHARTERED', 'CANCEL', 'OFFLOAD', 'TOPLOAD', 'SHIP', 'COMPLETE'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('orders', $column)) {
                    $table->dropColumn($column);
                }
            }

            // Add the new status column if it doesn't already exist
            if (!Schema::hasColumn('orders', 'status')) {
                $table->string('status')->default('inProgress');
            }
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void {
        Schema::table('orders', function (Blueprint $table) {
            // Re-add the old status columns if rolling back
            $columns = ['IN PROGRESS','TRANSFER', 'CHARTERED', 'CANCEL', 'OFFLOAD', 'TOPLOAD', 'SHIP', 'COMPLETE'];
            foreach ($columns as $column) {
                if (!Schema::hasColumn('orders', $column)) {
                    $table->string($column)->default('0');
                }
            }

            // Remove the new status column if it exists
            if (Schema::hasColumn('orders', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};