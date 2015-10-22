<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarConfiguracaoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracao',function(Blueprint $tabela){
            $tabela->engine      =   'InnoDB';

            $tabela->increments('id');
            $tabela->string('nome_empresa',150);
            $tabela->string('nome_abreviado',50);
            $tabela->string('cnpj',50);
            $tabela->string('telefone1',30);
            $tabela->string('telefone2',30);
            $tabela->string('telefone3',30);
            $tabela->string('endereco',100);
            $tabela->string('numero',20);
            $tabela->string('bairro',100);
            $tabela->string('cidade',100);
            $tabela->string('estado',100);
            $tabela->string('email',100);
            $tabela->string('logo',255);


            $tabela->longText('contrato');
            $tabela->longText('cliente');
            $tabela->longText('veiculo');
            $tabela->longText('marca');
            $tabela->longText('modelo');
            $tabela->longText('estoque');
            $tabela->longText('categoria');
            $tabela->longText('servico');

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
        Schema::dropIfExists('configuracao');
    }
}
