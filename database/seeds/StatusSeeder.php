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
            'nome'       =>  'Criado',
            'obs'       =>  'Status de criação, responsável por definir o momento da criação do registro.',
            'cor'       =>  '#CCCC00'
        ]);
        DB::table('status')->insert([
           'nome'       =>  'Orçamento',
            'obs'       =>  'Orçamento de serviço.',
            'cor'       =>  '#CCCC00'
        ]);
        DB::table('status')->insert([
            'nome'       =>  'Cancelado',
            'obs'       =>  'Registro foi cancelado.',
            'cor'       =>  '#000000'
        ]);
        DB::table('status')->insert([
            'nome'       =>  'Em Aberto',
            'obs'       =>  'O registro esta em aberto',
            'cor'       =>  '#0033CC'
        ]);
        DB::table('status')->insert([
            'nome'       =>  'Em Andamento',
            'obs'       =>  'O servico esta em andamento.',
            'cor'       =>  '#0099FF'
        ]);
        DB::table('status')->insert([
            'nome'       =>  'Finalizado',
            'obs'       =>  'O serviço foi finalizado',
            'cor'       =>  '#669999'
        ]);

    }
}
