<?php

use Illuminate\Database\Seeder;

class TelefoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('telefones')->insert([
           'id'             =>  986607785,
            'ddd'           =>  '085',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('telefones')->insert([
            'id'             =>  988056135,
            'ddd'           =>  '085',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('telefones')->insert([
            'id'             =>  34921856,
            'ddd'           =>  '085',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('telefones')->insert([
            'id'             =>  987747363,
            'ddd'           =>  '085',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('telefones')->insert([
            'id'             =>  996218247,
            'ddd'           =>  '085',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('telefones')->insert([
            'id'             =>  30458247,
            'ddd'           =>  '085',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('telefones')->insert([
            'id'             =>  30870287,
            'ddd'           =>  '085',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('telefones')->insert([
            'id'             =>  32727620,
            'ddd'           =>  '085',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);

    }
}
