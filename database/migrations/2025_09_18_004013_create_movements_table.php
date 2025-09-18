<?php

use App\Models\Account;
use App\Models\Category;
use App\Models\Currency;
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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Account::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Currency::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Category::class)->constrained();
            $table->integer('parent_id')->nullable();
            $table->bigInteger('amount')->default(0);
            $table->enum('type', ['income', 'expense', 'transfer']);
            $table->text('description')->default('');
            $table->timestamp('date');
            $table->bigInteger('previous_balance');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
