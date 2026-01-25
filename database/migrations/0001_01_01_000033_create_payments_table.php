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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();

            // مبلغ تراکنش
            $table->unsignedInteger('amount');

            // نوع: پیش‌پرداخت یا پرداخت نهایی
            $table->enum('type', ['initial', 'final']);

            // وضعیت پرداخت
            $table->enum('status',
                ['pending',
                    'paid',
                    'failed'
                ])->default('pending');

            $table->enum('method', [
                'gateway',
                'wallet'
            ]);

            // اطلاعات تراکنش بانکی، اختیاری
            $table->string('authority')->nullable(); // authority / transaction_id
            $table->string('gateway')->nullable(); // zarinpal, ...

            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->index(['order_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
