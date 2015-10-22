<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarPedidoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos',function(Blueprint $tabela){
            $tabela->engine =   'InnoDB';

            $tabela->increments('id');
            $tabela->bigInteger('contrato_id',false,true);
            $tabela->integer('peca_id',false,true);
            $tabela->decimal('valor',9,2);
            $tabela->decimal('valor_total',9,2);
            $tabela->integer('qnt',false,false);
            $tabela->timestamps();

            $tabela->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
            $tabela->foreign('peca_id')->references('id')->on('pecas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
