<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Laboratorium extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->bigIncrements('idinventaris');
            $table->String('namaaset');
            $table->char('tahun', 4);
            $table->integer('jumlah');
            $table->integer('idkondisiaset');
            $table->timestamps();
        });

        Schema::create('kondisiaset', function (Blueprint $table) {
            $table->bigIncrements('idkondisiaset');
            $table->String('keterangan');
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
        //
    }
}
