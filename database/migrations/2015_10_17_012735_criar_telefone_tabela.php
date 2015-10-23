<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTelefoneTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefones',function(Blueprint $tabela){
            $tabela->engine     =   'InnoDB';

            $tabela->bigInteger('id',false,true);
            $tabela->string('ddd');
            $tabela->string('operadora')->nullable();
            $tabela->string('tipo')->nullable();
            $tabela->timestamps();

            $tabela->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefones');
    }
}
