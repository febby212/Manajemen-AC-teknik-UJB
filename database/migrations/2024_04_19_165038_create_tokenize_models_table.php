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
        Schema::create('tokenize_models', function (Blueprint $table) {
            $table->string('id');
            $table->string('teknisi_id');
            $table->string('token');
            $table->boolean('used')->default(false);
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            //ref id AC
            $table->foreign('teknisi_id')
                ->references('id')
                ->on('teknisis')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokenize_models');
    }
};
