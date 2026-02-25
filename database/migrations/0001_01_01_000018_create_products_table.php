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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('en_name');
            $table->string('slug')->unique();

            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->boolean('has_thumbnail')->nullable();

            $table->boolean('is_group_buy')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);

            $table->unsignedInteger('price');
            $table->unsignedInteger('sale_price')->nullable();

            $table->unsignedInteger('stock')->default(0);
            $table->boolean('track_stock')->default(true);

            // Rating
            $table->decimal('rating_avg', 3, 2)->default(0);
            $table->unsignedInteger('rating_count')->default(0);

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['price', 'sale_price']);
            $table->index(['category_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
