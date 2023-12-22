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
        Schema::table('relations', function (Blueprint $table) {
            $table->foreign('mahasiswa_npm')->references('npm')->on('mahasiswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dosen_nidn')->references('nidn')->on('dosens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('matakuliah_kode')->references('kode_mk')->on('matakuliahs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('relations', function (Blueprint $table) {
        // $table->dropForeign('relations_user_id_foreign');

        $table->dropForeign('relations_mahasiswa_npm_foreign');
        $table->dropForeign('relations_dosen_nidn_foreign');
        $table->dropForeign('relations_matakuliah_kode_foreign');
      });
    }
};
