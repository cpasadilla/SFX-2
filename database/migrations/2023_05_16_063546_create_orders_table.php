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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('orderId')->primary();
            $table->float('totalAmount');
            $table->string('cID');
            $table->string('shipNum');
            $table->string('consigneeName');
            $table->string('consigneeNum');
            $table->string('origin');
            $table->string('destination');
            $table->unsignedBigInteger('cargoID') -> default(0);
            $table->string('cargoNum')-> default(value: 0);
            $table->string('voyageNum')->nullable();  // Add voyageNum
            $table->string('containerNum')->nullable();  // Add containerNum
            $table->string('value')->nullable();  // Add voyageNum


            $table->string('orderCreated');
            $table->string('inWarehouse')->default("0");
            $table->string('loading')->default("0");
            $table->string('inTransit')->default("0");
            $table->string('arrival')->default("0");
            $table->string('unloading')->default("0");
            $table->string('parcelReceived')->default("0");
            $table->string('personRec')->default("0");
            $table->string('personNum')->default("0");
            $table->string('status')->default('inProgress');

            $table->timestamps();

            $table->index('cargoNum');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('voyageNum');
            $table->dropColumn('containerNum');
            $table->dropColumn('valuation');
        });
    }
};
