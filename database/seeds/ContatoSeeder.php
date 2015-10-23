<?php

use Illuminate\Database\Seeder;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contatos')->insert([
            'cliente_id'    =>  1,
            'telefone_id'   =>  986607785,
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('contatos')->insert([
            'cliente_id'    =>  1,
            'telefone_id'   =>  34921856,
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('contatos')->insert([
            'cliente_id'    =>  2,
            'telefone_id'   =>  988056135,
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
