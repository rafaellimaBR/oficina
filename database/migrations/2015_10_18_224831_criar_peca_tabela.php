<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarPecaTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pecas', function(Blueprint $tabela){
            $tabela->engine =   'InnoDB';

            $tabela->increments('id');
            $tabela->string('referencia')->nullable();
            $tabela->string('codigo_original')->nullable();
            $tabela->text('aplicacao');
            $tabela->longText('pesquisa');
            $tabela->string('descricao');
            $tabela->decimal('valor',9,2);
            $tabela->integer('qnt',false,false);
            $tabela->integer('categoria_id',false,true);
            $tabela->string('marca');
            $tabela->string('unidade');
            $tabela->timestamps();

            $tabela->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pecas');
    }
}
