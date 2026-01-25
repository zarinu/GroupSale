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
        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_variant_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('type', [
                'in',        // ورود کالا
                'out',       // خروج (فروش)
                'reserve',   // رزرو موقت
                'release',   // آزادسازی رزرو
                'adjust'     // اصلاح دستی
            ]);

            $table->integer('quantity');
            // why: منفی/مثبت بودن با type کنترل می‌شود

            $table->integer('before');
            $table->integer('after');

            $table->string('reference_type')->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();
            // why: اتصال به order, return, admin_action

            $table->text('note')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['product_variant_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_transactions');
    }
};
