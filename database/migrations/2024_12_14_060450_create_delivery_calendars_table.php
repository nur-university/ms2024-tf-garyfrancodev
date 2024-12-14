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
        Schema::create('delivery_calendars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('address_id');
            $table->string('meal_plan_id');
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->text('comments')->nullable();
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('address_id')->references('id')->on('address')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_calendars');
    }
};
