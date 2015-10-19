<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarVeiculoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('veiculos',function(Blueprint $tabela){
            $tabela->engine     =   'InnoDB';


            $tabela->string('id',10)->unique();
            $tabela->string('cidade',50);
            $tabela->string('estado',2);
            $tabela->string('cor',60);
            $tabela->string('ano_fabricacao',4)->nullable();
            $tabela->string('ano_modelo',4)->nullable();
            $tabela->string('combustivel',60)->nullable();
            $tabela->integer('modelo_id',false,true);
            $tabela->integer('cliente_id',false,true);
            $tabela->string('motor')->nullable();
            $tabela->timestamps();

            $tabela->primary('id');
            $tabela->foreign('modelo_id')->references('id')->on('modelos')->onDelete('cascade');
            $tabela->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('veiculos');
    }
}
