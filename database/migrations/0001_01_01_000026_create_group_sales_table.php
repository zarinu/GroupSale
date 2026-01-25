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
        Schema::create('group_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_variant_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->dateTime('starts_at');
            $table->dateTime('ends_at');

            $table->enum('status', ['pending', 'active', 'closed', 'expired'])->default('pending');
            $table->unsignedInteger('min_participants')->default(1);// حداقل نفرات برای فعال شدن
            $table->unsignedInteger('current_participants')->default(0);
            $table->unsignedInteger('max_participants')->nullable();

            $table->unsignedInteger('current_price')->nullable();
            $table->unsignedInteger('final_price')->nullable();

            $table->boolean('notified')->default(false);
            $table->boolean('is_successful')->nullable();

            $table->decimal('initial_payment_percentage', 5, 2)->default(20); // مثلا ۲۰٪ پیش پرداخت
            $table->timestamps();
            $table->softDeletes();

            $table->index(['product_variant_id', 'starts_at', 'ends_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_sales');
    }
};
