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
        Schema::create('report_damage_a_c_s', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->string('ac_desc_id');
            $table->string('history_id')->nullable();
            $table->text('kerusakan');
            $table->date('tgl_report');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('ac_desc_id')
            ->references('id')
            ->on('ac_descs');
            $table->foreign('history_id')
            ->references('id')
            ->on('histories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_damage_a_c_s');
    }
};
