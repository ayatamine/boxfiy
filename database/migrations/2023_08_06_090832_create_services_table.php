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
        Schema::disableForeignKeyConstraints();

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->foreignId('category_id')->constrained();
            $table->mediumInteger('min_qte')->default(1);
            $table->mediumInteger('max_qte');
            $table->double('price');
            $table->enum('status', ["active","unactive"]);
            $table->enum('type', ["default"])->default('default');
            $table->enum('quality', ["normal","medium","excellent"]);
            $table->boolean('partial_process')->default(false);
            $table->enum('data_source', ["manual","api"])->default('manual');
            $table->foreignId('api_id')->constrained();
            $table->unsignedInteger('api_service_id')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
