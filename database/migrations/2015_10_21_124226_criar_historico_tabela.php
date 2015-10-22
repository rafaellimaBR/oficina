<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarHistoricoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos',function(Blueprint $tabela){
           $tabela->engine  =   'InnoDB';

            $tabela->increments('id');
            $tabela->integer('status_id',false,true);
            $tabela->bigInteger('contrato_id',false,true);
            $tabela->text('obs');
            $tabela->dateTime('data');
            $tabela->timestamps();

            $tabela->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $tabela->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historicos');
    }
}
