<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('defaulters', function (Blueprint $table) {
            $table->id();

            // Adding the required columns for your system
            $table->string('reference_no')->unique();
            $table->string('circle');
            $table->enum('tariff_type', ['DOM', 'IND', 'AGRI', 'COM', 'OTHER']);
            $table->enum('status', ['Active', 'Disconnected']);
            $table->enum('consumer_type', ['Private', 'Govt']);
            $table->decimal('outstanding_amount', 15, 2);
            $table->decimal('revenue_recovered', 15, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defaulters');
    }
};
