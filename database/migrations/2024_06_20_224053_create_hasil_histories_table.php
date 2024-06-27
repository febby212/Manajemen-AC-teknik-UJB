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
            $table->string('kode_prediksi');
            $table->string('user_id');
            $table->string('dataAc_id');
            $table->string('kd_penyakit');
            $table->string('kd_gejala');
            $table->string('penyakit');
            $table->text('solusi');
            $table->string('persentase');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('dataAc_id')
            ->references('id')
            ->on('ac_descs');

            $table->foreign('user_id')
            ->references('id')
            ->on('users');
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
