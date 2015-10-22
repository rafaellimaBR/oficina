<?php

use Illuminate\Database\Seeder;

class ConfiguracaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('configuracao')->insert([
            'nome_empresa'      =>  'Minha Empresa',
            'nome_abreviado'    =>  'ME',
            'cnpj'              =>  '00000000000000',
            'telefone1'         =>  '0000000000000',
            'telefone2'         =>  '0000000000000',
            'telefone3'         =>  '0000000000000',
            'endereco'          =>  'Rua Brasil',
            'numero'            =>  '000',
            'cep'               =>  '00000000',
            'bairro'            =>  'bairro',
            'cidade'            =>  'cidade',
            'estado'            =>  'estado',
            'email'             =>  'empresa@empresa.com.br',
            'logo'              =>  '15102118583.png'
        ]);
    }
}
