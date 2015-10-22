<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
           'nome'       =>  'Orçamento',
            'cor'       =>  '#CCCC00'
        ]);
        DB::table('status')->insert([
            'nome'       =>  'Cancelado',
            'cor'       =>  '#000000'
        ]);
        DB::table('status')->insert([
            'nome'       =>  'Em Aberto',
            'cor'       =>  '#0033CC'
        ]);
        DB::table('status')->insert([
            'nome'       =>  'Em Andamento',
            'cor'       =>  '#0099FF'
        ]);
        DB::table('status')->insert([
            'nome'       =>  'Finalizado',
            'cor'       =>  '#669999'
        ]);
    }
}
