<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarGruposTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos',function(Blueprint $tabela){
           $tabela->engine      =   'InnoDB';

            $tabela->increments('id');
            $tabela->string('nome',100);
            $tabela->text('descricao');
            $tabela->text('cliente');
            $tabela->text('veiculo');
            $tabela->text('modelo');
            $tabela->text('marca');
            $tabela->text('estoque');
            $tabela->text('categoria');
            $tabela->text('servico');
            $tabela->text('contrato');
            $tabela->text('usuario');
            $tabela->text('grupo');
            $tabela->text('configuracao');

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
        Schema::drop('grupos');
    }
}
