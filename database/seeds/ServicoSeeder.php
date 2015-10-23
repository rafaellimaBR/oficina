<?php

use Illuminate\Database\Seeder;

class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicos')->insert([
           'nome'       =>  'Orçamento',
            'valor'     =>  80.00,
            'created_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('servicos')->insert([
            'nome'       =>  'Limpeza de bicos injetores',
            'valor'     =>  50.00,
            'created_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('servicos')->insert([
            'nome'       =>  'Desmontagem do painel de instrumento',
            'valor'     =>  30.00,
            'created_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
