l<?php

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
        Schema::create('group_sale_participants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('group_sale_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedInteger('estimated_price');
            $table->unsignedInteger('final_price')->nullable();

            $table->unsignedInteger('amount_paid')->default(0);

            $table->enum('payment_status', ['pending', 'partial', 'group_success', 'paid', 'group_failed', 'cancelled'])->default('pending');

            $table->timestamp('joined_at')->nullable();
            $table->timestamp('primary_paid_at')->nullable();
            $table->timestamp('final_paid_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_sale_participants');
    }
};
