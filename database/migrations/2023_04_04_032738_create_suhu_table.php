<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuhuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suhu', function (Blueprint $table) {
            $table->bigIncrements('id_suhu');
            $table->unsignedBigInteger('lokasi_id');
            $table->double('suhu', 8, 2)->notNull();
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
        Schema::dropIfExists('suhu');
    }
}
