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
        Schema::table('payment_gateways', function (Blueprint $table) {
           $table->boolean('is_attached_with_spaceremit')->default(false);
           $table->text('how_to_pay_description')->nullable();
           $table->double('min_amount')->default(1);
           $table->double('max_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_gateways', function (Blueprint $table) {
            $table->dropColumn('is_attached_with_spaceremit');
            $table->dropColumn('how_to_pay_description');
            $table->dropColumn('min_amount');
            $table->dropColumn('max_amount');
        });
    }
};
