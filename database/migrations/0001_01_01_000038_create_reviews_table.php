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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name')->nullable();
            $table->string('mobile', 11)->nullable();

            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedInteger('parent_id')
                ->nullable();

            $table->unsignedTinyInteger('rating'); // 1..5
            $table->text('comment')->nullable();

            $table->boolean('is_approved')->default(false);
            $table->unsignedInteger('likes')->nullable();
            $table->unsignedInteger('dislikes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['user_id', 'product_id']); // one review per user
            $table->index(['product_id', 'is_approved']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
