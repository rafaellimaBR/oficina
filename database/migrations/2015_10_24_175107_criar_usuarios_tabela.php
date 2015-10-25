<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarUsuariosTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios',function(Blueprint $tabela){
           $tabela->engine      =   'InnoDB';

            $tabela->increments('id');
            $tabela->string('nome');
            $tabela->string('registro',100)->unique();
            $tabela->string('email',100)->unique();
            $tabela->string('cep',100);
            $tabela->string('logradouro',100);
            $tabela->string('numero',100);
            $tabela->string('bairro',100);
            $tabela->string('cidade',100);
            $tabela->string('estado',100);
            $tabela->string('telefone',100);
            $tabela->string('celular',100);
            $tabela->string('foto',220);
            $tabela->string('password',255);
            $tabela->integer('grupo_id',false,true);
            $tabela->timestamps();
            $tabela->rememberToken();

            $tabela->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
