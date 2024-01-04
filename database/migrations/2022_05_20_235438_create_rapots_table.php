<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapot', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('siswa_id');
            $table->bigInteger('kelas_id');
            $table->bigInteger('guru_id');
            $table->bigInteger('pelajaran_id');
            $table->string('nilaip', 5);
            $table->string('predikatp', 5);
            $table->string('deskripsip', 5);
            $table->string('nilaik', 5)->nullable();
            $table->string('predikatk', 5)->nullable();
            $table->string('deskripsik', 5)->nullable();
            $table->biginteger('semester_id');
            $table->biginteger('tahun_ajaran_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapot');
    }
};
