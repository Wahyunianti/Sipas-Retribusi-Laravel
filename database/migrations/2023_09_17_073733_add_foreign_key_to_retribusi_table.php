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
        Schema::table('retribusi', function (Blueprint $table) {
            $table->foreign('data_pasar_id')->references('id')->on('data_pasar');
            $table->foreign('bagian_id')->references('id')->on('bagian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('retribusi', function (Blueprint $table) {
            //
        });
    }
};
