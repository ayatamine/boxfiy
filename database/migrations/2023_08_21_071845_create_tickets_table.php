<?php

use App\Models\Order;
use App\Models\TicketCategory;
use App\Models\User;
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
        Schema::disableForeignKeyConstraints();

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TicketCategory::class)->nullable();
            $table->foreignIdFor(Order::class)->nullable();
            $table->foreignIdFor(User::class)->nullable();
            $table->string('title')->nullable();
            $table->mediumText('content');
            $table->enum('status',['pending','open','closed'])->default('pending');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
