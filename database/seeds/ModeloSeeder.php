<?php

use Illuminate\Database\Seeder;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modelos')->insert([
            'nome'      =>  'Gol 1.0 trend',
            'marca_id'  =>  1,
            'created_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
