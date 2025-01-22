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
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('min_amount');
            $table->dropColumn('plus_amount');
            $table->decimal('amount', total: 8,places: 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->decimal('min_amount', total: 8,places: 2)->nullable();
            $table->decimal('plus_amount', total: 8,places: 2)->nullable();
            $table->dropColumn('amount');
        });
    }
};
