<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->increments('id',11);   //clave primaria(auto_increment)
            $table->string('titulo',128);
            $table->string('descripcion',500);            
            $table->float('precio')->default(0);
            $table->string('imagen',300)->nullable();            
            $table ->timestamps();  //marcas de tiempo created_at y update_at            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncios');
    }
}
