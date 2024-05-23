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
        Schema::create('inisialisasi_kerusakans', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->string('kode_kerusakan');
            $table->string('kerusakan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inisialisasi_kerusakans');
    }
};
