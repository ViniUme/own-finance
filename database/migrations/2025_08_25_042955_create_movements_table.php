<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('account_id')->constrained();
            $table->foreignId('currency_id')->constrained();
            $table->foreignUuid('category_id')->constrained();
            $table->uuid('parent_id')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->enum('type', ['income', 'expense', 'transfer']);
            $table->string('description')->nullable();
            $table->timestamp('date')->nullable();
            $table->bigInteger('previous_balance');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('movements', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('movements');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
