<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatekelembabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelembaban', function (Blueprint $table) {
            $table->id('id_kelembaban');
            $table->unsignedBigInteger('lokasi_id');
            $table->float('kelembaban');
            $table->timestamp('waktu')->nullable();
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
        Schema::dropIfExists('kelembaban');
    }
}
