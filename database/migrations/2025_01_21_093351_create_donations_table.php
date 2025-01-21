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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->decimal('amount', 15, 2);
            $table->enum('payment_method', ['card', 'bank_transfer', 'cash', 'esewa', 'khalti', 'imepay']);
            $table->enum('payment_status', ['pending', 'completed', 'failed']);
            $table->string('transaction_proof')->nullable();
            $table->text('donor_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
