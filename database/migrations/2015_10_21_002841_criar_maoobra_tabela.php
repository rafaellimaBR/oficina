<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarMaoobraTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maoobras',function(Blueprint $tabela){
           $tabela->engine  =   'InnoDB';

            $tabela->increments('id');
            $tabela->decimal('valor',9,2);
            $tabela->bigInteger('contrato_id',false,true);
            $tabela->integer('servico_id',false,true);
            $tabela->timestamps();

            $tabela->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
            $tabela->foreign('servico_id')->references('id')->on('servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maoobras');
    }
}
