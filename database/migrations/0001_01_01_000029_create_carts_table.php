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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            // why: سبد خرید مهمان user_id ندارد

            $table->string('session_id')->nullable();
            // why: پشتیبانی از guest cart

            $table->boolean('is_active')->default(true);
            // why: پس از تبدیل به order غیرفعال می‌شود

            $table->timestamps();

            $table->index(['user_id', 'session_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
