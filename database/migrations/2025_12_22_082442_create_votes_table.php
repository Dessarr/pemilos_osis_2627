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
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nis', 20);
            $table->integer('kandidat_id');
            $table->string('token', 12);
            $table->timestamp('voted_at')->useCurrent();
            $table->timestamps();
            
            $table->foreign('kandidat_id')->references('id')->on('kandidat')->onDelete('cascade');
            $table->index('nis');
            $table->index('kandidat_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};