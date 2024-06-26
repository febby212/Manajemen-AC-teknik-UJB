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
        Schema::create('histories', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->string('ac_desc_id');
            $table->string('teknisi_id');
            $table->string('kode_perbaikan');
            $table->text('kerusakan');
            $table->text('perbaikan');
            $table->string('pos_anggaran')->nullable();
            $table->date('tgl_perbaikan');
            $table->string('PPA')->nullable();
            $table->integer('biaya')->nullable();
            $table->string('mengetahui')->nullable();
            $table->string('menyetujui')->nullable();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('ac_desc_id')
            ->references('id')
            ->on('ac_descs');

            $table->foreign('teknisi_id')
            ->references('id')
            ->on('teknisis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
