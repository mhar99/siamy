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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('siswa_id');
            $table->biginteger('kelas_id');
            $table->bigInteger('guru_id');
            $table->bigInteger('pelajaran_id');
            $table->string('tugas', 5)->nullable();
            $table->string('ulhar1',5)->nullable();
            $table->string('uts', 5)->nullable();
            $table->string('ulhar2', 5)->nullable();
            $table->string('uas', 5)->nullable();
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
        Schema::dropIfExists('npengetahuan');
    }
};
