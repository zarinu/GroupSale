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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->integer('parent_id')->nullable();
            $table->string('group')->nullable(); // general, payment, deal, seo

            $table->string('key')->unique(); // site_name, deal_timeout, wallet_min_charge
            $table->longText('value')->nullable();
            $table->string('type')->default('string'); // string, int, bool, json

            $table->boolean('order')->unsigned()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
