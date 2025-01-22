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
        Schema::create('user_savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('user_categories')->onDelete('cascade'); // This ensures it's not nullable
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->char('name');
            $table->longText('description')->nullable();
            $table->decimal('total_amount', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_savings');
    }
};
