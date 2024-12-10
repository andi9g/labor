<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('aset', function (Blueprint $table) {
            $table->bigIncrements('idaset');
            $table->String('namaaset');
            $table->char('tahunaset', 4);
            $table->integer('jumlahaset');
            $table->timestamps();
        });


        $asets = [
            [
                "namaaset" => "Komputer Server 2019",
                "tahunaset" => "2024",
                "jumlahaset" => "2",
            ],
            [
                "namaaset" => "Komputer Client",
                "tahunaset" => "2023",
                "jumlahaset" => "20",
            ],
            [
                "namaaset" => "Mouse",
                "tahunaset" => "2023",
                "jumlahaset" => "25",
            ],
            [
                "namaaset" => "Keyboard",
                "tahunaset" => "2023",
                "jumlahaset" => "25",
            ],
            [
                "namaaset" => "Printer",
                "tahunaset" => "2020",
                "jumlahaset" => "2",
            ],
        ];


        foreach ($asets as $aset) {
            DB::table("aset")->insert($aset);
        }

        Schema::create('asetrusak', function (Blueprint $table) {
            $table->bigIncrements('idasetrusak');
            $table->integer('idaset');
            $table->integer('jumlahasetrusak');
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
