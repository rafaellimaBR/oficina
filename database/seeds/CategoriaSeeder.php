<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
           'nome'       =>  'Sensores',
            'created_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('categorias')->insert([
            'nome'       =>  'Paineis',
            'created_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('categorias')->insert([
            'nome'       =>  'Lâmpadas',
            'created_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('categorias')->insert([
            'nome'       =>  'Baterias',
            'created_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('categorias')->insert([
            'nome'       =>  'Relógios',
            'created_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('categorias')->insert([
            'nome'       =>  'Óleos',
            'created_at'=>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
