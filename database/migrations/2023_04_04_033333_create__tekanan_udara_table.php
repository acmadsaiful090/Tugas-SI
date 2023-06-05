<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatetekananudaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tekananudara', function (Blueprint $table) {
            $table->id('id_tekananudara');
            $table->unsignedBigInteger('lokasi_id');
            $table->float('tekananudara');
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
        Schema::dropIfExists('tekananudara');
    }
}
