<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome'          =>  'Rafael do Nascimento Lima',
            'email'         =>  'rafaelnlima@live.com',
            'tipo_registro' =>  'cpf',
            'registro'      =>  '04020676305',
            'cep'           =>  '60420431',
            'logradouro'    =>  'Av. Prof. Gomes de Matos',
            'numero'        =>  '0000',
            'bairro'        =>  'bairro',
            'cidade'        =>  'Fortaleza',
            'estado'        =>  'Ce',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('clientes')->insert([
            'nome'          =>  'Ana Karla Mesquisa Lima ',
            'email'         =>  'akma.85@hotmail.com',
            'tipo_registro' =>  'cpf',
            'registro'      =>  '04020676304',
            'cep'           =>  '60420431',
            'logradouro'    =>  'Av. Prof. Gomes de Matos',
            'numero'        =>  '0000',
            'bairro'        =>  'bairro',
            'cidade'        =>  'Fortaleza',
            'estado'        =>  'Ce',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('clientes')->insert([
            'nome'          =>  'Francisco Sávio Franco de Lima',
            'email'         =>  'tecvelsavio@hotmail.com',
            'tipo_registro' =>  'cpf',
            'registro'      =>  '04020676303',
            'cep'           =>  '60420431',
            'logradouro'    =>  'Av. Prof. Gomes de Matos',
            'numero'        =>  '0000',
            'bairro'        =>  'bairro',
            'cidade'        =>  'Fortaleza',
            'estado'        =>  'Ce',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
