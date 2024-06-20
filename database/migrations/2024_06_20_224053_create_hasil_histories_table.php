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
        Schema::create('hasil_histories', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->string('user_id');
            $table->string('dataAc_id');
            $table->string('kd_penyakit');
            $table->string('kd_gejala');
            $table->string('solusi_1');
            $table->string('solusi_2');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_histories');
    }
};
