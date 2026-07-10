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
        Schema::table('invested', function (Blueprint $table) {
            $table->renameColumn('category', 'cr_dr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invested', function (Blueprint $table) {
            $table->renameColumn('cr_dr', 'category');
        });
    }
};
