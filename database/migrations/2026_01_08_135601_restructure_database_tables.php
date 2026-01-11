<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Rename siswa table to murid
        Schema::rename('siswa', 'murid');
        
        // Modify murid table structure
        Schema::table('murid', function (Blueprint $table) {
            // Drop old columns if exist
            $table->dropColumn(['password']); // Will be handled separately if exists
        });
        
        // Recreate murid table with new structure
        Schema::dropIfExists('murid');
        Schema::create('murid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 255);
            $table->string('kelas', 10);
            $table->char('nis', 9)->unique();
            $table->string('nisn', 10);
            $table->boolean('has_voted')->default(false);
        });
        
        // Modify votes table - remove nis and token, keep only id, kandidat_id, voted_at
        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign(['kandidat_id']);
            $table->dropIndex(['nis']);
            $table->dropIndex(['kandidat_id']);
        });
        
        Schema::dropIfExists('votes');
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kandidat_id');
            $table->timestamp('voted_at')->useCurrent();
            
            $table->foreign('kandidat_id')->references('id')->on('kandidat')->onDelete('cascade');
            $table->index('kandidat_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert votes table
        Schema::dropIfExists('votes');
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
        
        // Revert murid to siswa
        Schema::dropIfExists('murid');
        Schema::create('siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nis', 20)->unique();
            $table->string('password', 20);
            $table->string('nama', 100);
            $table->string('kelas', 20);
        });
    }
};
