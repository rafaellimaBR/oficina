<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarServicoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos',function(Blueprint $tabela){
            $tabela->engine     =   'InnoDB';

            $tabela->increments('id');
            $tabela->string('nome')->unique();
            $tabela->decimal('valor',9,2);
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
        Schema::drop('servicos');
    }
}
