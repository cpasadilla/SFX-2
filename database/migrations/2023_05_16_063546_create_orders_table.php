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
                $table->id();
                $table->string('orderId');
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
                $table->string('status')->nullable();
                $table->string('gates')->nullable();

                $table->string('orderCreated');

                $table->string('value')->nullable();
                $table->string('mark')->nullable();

                $table->string('OR')->nullable();
                $table->string('AR')->nullable();
                $table->string('bl_status')->nullable();
                $table->string('cargo_status')->nullable();
                $table->string('createdBy');
                $table->timestamps();
                $table->index('cargoNum');
                $table->unique(['orderId', 'voyageNum', 'shipNum'], 'unique_order_per_voyage_ship');
            });
        } else {
            Schema::table('orders', function (Blueprint $table) {
                // Add new columns if they do not already exist
                if (!Schema::hasColumn('orders', 'status')) {
                    $table->string('status')->default('CHARTERED');
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
                $columns = ['CHARTERED','LOOSE CARGO', 'STUFFING'];
                //$columns = ['inProgress','TRANSFER', 'CHARTERED', 'CANCEL', 'OFFLOAD', 'TOPLOAD', 'SHIP', 'COMPLETE', 'PAID', 'UNPAID'];
                foreach ($columns as $column) {
                    if (!Schema::hasColumn('orders', $column)) {
                        $table->string($column)->default('0');
                    }
                }
            });
        }
    }
};
