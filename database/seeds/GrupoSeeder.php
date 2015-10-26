<?php

use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {

        DB::table('grupos')->insert([
            'nome'          =>      'Admin',
            'descricao'     =>      'Grupo de administradores do sistema com total acesso.',
            'cliente'       =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"1";s:3:"exc";s:1:"1";}',
            'veiculo'       =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"1";s:3:"exc";s:1:"1";}',
            'modelo'        =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"1";s:3:"exc";s:1:"1";}',
            'marca'         =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"1";s:3:"exc";s:1:"1";}',
            'estoque'       =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"1";s:3:"exc";s:1:"1";}',
            'categoria'     =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"1";s:3:"exc";s:1:"1";}',
            'servico'       =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"1";s:3:"exc";s:1:"1";}',
            'contrato'      =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"1";s:3:"exc";s:1:"1";}',
            'usuario'       =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"0";s:3:"edi";s:1:"0";s:3:"exc";s:1:"0";}',
            'grupo'         =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"1";s:3:"exc";s:1:"1";}',
            'configuracao'  =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"1";s:3:"exc";s:1:"1";}',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()

        ]);
        DB::table('grupos')->insert([
            'nome'          =>      'Demonstração',
            'descricao'     =>      'Grupo destinado a usuarios convidados para fins de demonstração do sistema.',
            'cliente'       =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"0";s:3:"exc";s:1:"0";}',
            'veiculo'       =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"0";s:3:"exc";s:1:"0";}',
            'modelo'        =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"0";s:3:"exc";s:1:"0";}',
            'marca'         =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"0";s:3:"exc";s:1:"0";}',
            'estoque'       =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"0";s:3:"exc";s:1:"0";}',
            'categoria'     =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"0";s:3:"exc";s:1:"0";}',
            'servico'       =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"0";s:3:"exc";s:1:"0";}',
            'contrato'      =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"1";s:3:"edi";s:1:"0";s:3:"exc";s:1:"0";}',
            'usuario'       =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"0";s:3:"edi";s:1:"0";s:3:"exc";s:1:"0";}',
            'grupo'         =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"0";s:3:"edi";s:1:"0";s:3:"exc";s:1:"0";}',
            'configuracao'  =>  'a:4:{s:3:"vis";s:1:"1";s:3:"cri";s:1:"0";s:3:"edi";s:1:"0";s:3:"exc";s:1:"0";}',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()

        ]);
    }
}
