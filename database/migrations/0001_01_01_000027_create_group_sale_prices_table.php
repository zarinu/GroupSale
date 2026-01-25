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
        Schema::create('group_sale_prices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('group_sale_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedInteger('min_buyers');// از چند نفر به بالا
            $table->unsignedInteger('price');
            $table->timestamps();

            $table->unique(['group_sale_id', 'min_buyers']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_sale_prices');
    }
};
