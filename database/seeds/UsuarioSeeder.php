<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome'          =>      'Rafael do Nascimento Lima',
            'registro'      =>      '04020677777',
            'email'         =>      'rafaelnlima@live.com',
            'cep'           =>      '60420431',
            'logradouro'    =>      'Av. Prof. Gomes de Matos',
            'numero'        =>      '0000',
            'bairro'        =>      'Montese',
            'cidade'        =>      'Fortaleza',
            'estado'        =>      'Ce',
            'telefone'      =>      '(85) 34921855',
            'celular'       =>      '(85) 986607788',
            'password'      =>      crypt('1966196089',''),
            'grupo_id'      =>      1,
            'created_at'    =>      \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>      \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('usuarios')->insert([
            'nome'          =>      'Usuário Demo',
            'registro'      =>      '0000000000',
            'email'         =>      'demo@exemplo.com.br',
            'cep'           =>      '000000000',
            'logradouro'    =>      'Rua Demonstração',
            'numero'        =>      '0000',
            'bairro'        =>      'Demo',
            'cidade'        =>      'Demo',
            'estado'        =>      'De',
            'telefone'      =>      '(85) 000000000',
            'celular'       =>      '(85) 000000000',
            'password'      =>      crypt('demo',''),
            'grupo_id'      =>      2,
            'created_at'    =>      \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>      \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
