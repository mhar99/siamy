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
        Schema::create('kriteria_nilai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guru_id');
            $table->integer('kkm');
            $table->text('deskripsi_a')->nullable();
            $table->text('deskripsi_b')->nullable();
            $table->text('deskripsi_c')->nullable();
            $table->text('deskripsi_d')->nullable();
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
        Schema::dropIfExists('kriteria_nilai');
    }
};
