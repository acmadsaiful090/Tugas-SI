<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatekecepatananginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecepatanangin', function (Blueprint $table) {
            $table->id('id_kecepatanangin');
            $table->unsignedBigInteger('lokasi_id');
            $table->float('kecepatanangin');
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
        Schema::dropIfExists('kecepatanangin');
    }
}
