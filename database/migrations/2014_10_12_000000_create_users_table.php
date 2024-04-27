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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->string('name');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_wadek')->default(false);
            $table->boolean('is_dekan')->default(false);
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
