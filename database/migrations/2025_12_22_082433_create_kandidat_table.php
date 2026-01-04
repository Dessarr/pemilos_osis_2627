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
        Schema::create('kandidat', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nama', 100);
            $table->string('gambar', 255)->nullable();
            $table->string('ketos_nama', 100)->nullable();
            $table->string('ketos_kelas', 20)->nullable();
            $table->text('ketos_biodata')->nullable();
            $table->string('ketos_foto', 255)->nullable();
            $table->string('waketos_nama', 100)->nullable();
            $table->string('waketos_kelas', 20)->nullable();
            $table->text('waketos_biodata')->nullable();
            $table->string('waketos_foto', 255)->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kandidat');
    }
};
