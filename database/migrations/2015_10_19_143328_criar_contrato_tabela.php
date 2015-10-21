<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarContratoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos',function(Blueprint $tabela){
            $tabela->engine     =   'InnoDB';

            $tabela->bigInteger('id',false,true);
            $tabela->string('data_entrada');
            $tabela->string('data_saida');
            $tabela->text('obs');
            $tabela->text('defeito');
            $tabela->string('contato',100);
            $tabela->string('telefone_contato',25);
            $tabela->integer('cliente_id',false,true);
            $tabela->string('veiculo_id',10);
            $tabela->timestamps();

            $tabela->primary('id');
            $tabela->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $tabela->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
