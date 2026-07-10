<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->enum('allocated_purpose', ['gold', 'btc','saving_for_married'])->nullable()->change();
            $table->integer('allocate')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->enum('allocated_purpose', ['gold', 'btc','saving_for_married'])->nullable(false)->change();
            $table->integer('allocate')->nullable(false)->change();
        });
    }
};
