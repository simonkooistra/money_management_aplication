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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('saving_id');
            $table->char('name');
            $table->datetimes('add_at');
            $table->decimal('min_amount', total: 8,places: 2)->nullable();
            $table->decimal('plus_amount', total: 8,places: 2)->nullable();
            $table->timestamps();
        });

//        Schema::create('transaction_details', function (Blueprint $table) {
//
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
