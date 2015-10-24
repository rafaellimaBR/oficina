<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarContatoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos',function(Blueprint $tabela){
            $tabela->engine     =   'InnoDB';

            $tabela->increments('id');
            $tabela->bigInteger('telefone_id',false,true);
            $tabela->integer('cliente_id',false,true);
            $tabela->string('dis')->nullable();
            $tabela->timestamps();

            $tabela->foreign('telefone_id')->references('id')->on('telefones')->onDelete('cascade')->onUpdate('cascade');
            $tabela->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contatos');
    }
}
