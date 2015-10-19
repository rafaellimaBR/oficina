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
           'id'         =>  'HUI-3024',
            'marca'     =>  'VW',
            'modelo'    =>  'Gol 1.6 Trend',
            'portas'    =>  4,
            'cliente_id'=>  1,
            'created_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('veiculos')->insert([
            'id'         =>  'NVB-4344',
            'marca'     =>  'Fiat',
            'modelo'    =>  'Palio 1.0 Flex',
            'portas'    =>  4,
            'cliente_id'=>  1,
            'created_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
