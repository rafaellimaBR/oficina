<?php

use Illuminate\Database\Seeder;

class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('veiculos')->insert([
           'id'                 =>  'HUI3024',
            'cidade'            =>  'Fortaleza',
            'estado'            =>  'Ce',
            'cor'               =>  'prata',
            'ano_fabricacao'    =>  '2015',
            'ano_modelo'        =>  '2015',
            'combustivel'       =>  'flex',
            'modelo_id'         =>  1,
            'cliente_id'        =>  1,
            'motor'             =>  '1.0',
            'created_at'        =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'        =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
