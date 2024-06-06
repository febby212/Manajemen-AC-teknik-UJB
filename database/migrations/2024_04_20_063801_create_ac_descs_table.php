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
        Schema::create('ac_descs', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->string('id_jumlah');
            $table->string('kode_AC');
            $table->string('merek_id');
            $table->string('kelengkapan');
            $table->string('ruangan');
            $table->string('kondisi');
            $table->text('desc_kondisi');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('merek_id')
            ->references('id')
            ->on('merek_a_c_s');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_descs');
    }
};
