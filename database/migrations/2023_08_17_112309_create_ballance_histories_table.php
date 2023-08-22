<?php

use App\Models\User;
use App\Models\PaymentGateway;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ballance_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('transaction_type');
            $table->double('amount',10, 2)->default(0);
            $table->foreignIdFor(PaymentGateway::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ballance_histories');
    }
};
