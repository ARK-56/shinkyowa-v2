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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')
                ->nullable()
                ->constrained('countries')
                ->onDelete('SET NULL');
            $table->foreignId('stock_id')
                ->nullable()
                ->constrained('stocks')
                ->onDelete('SET NULL');
            $table->string('name', 120);
            $table->string('email', 150);
            $table->string('phone', 15);
            $table->string('country', 30);
            $table->text('message');
            $table->ipAddress('ip')
                ->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
