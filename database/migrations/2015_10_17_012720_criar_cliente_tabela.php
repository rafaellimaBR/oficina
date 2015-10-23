<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarClienteTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes',function(Blueprint $tabela){
            $tabela->engine     =   'InnoDB';

            $tabela->increments('id');
            $tabela->string('nome');
            $tabela->string('tipo_registro');
            $tabela->string('registro')->unique();
            $tabela->string('cep');
            $tabela->string('logradouro');
            $tabela->string('numero');
            $tabela->string('bairro');
            $tabela->string('cidade');
            $tabela->string('estado');
            $tabela->string('email')->unique();
            $tabela->text('pesquisa');

            $tabela->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
