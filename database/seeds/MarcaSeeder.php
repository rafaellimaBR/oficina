<?php

use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->insert([
           'nome'           =>   'Volkswagem',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Fiat',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Ford',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Renault',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Toyota',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Peugeot',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Agrale',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Audi',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'BMW',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Chery',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Chevrolet',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Citroën',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Honda',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Hyundai',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Iveco',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Jac Motors',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Kia',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('marcas')->insert([
            'nome'           =>   'Land Rover',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('marcas')->insert([
            'nome'           =>   'Lexus ',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('marcas')->insert([
            'nome'           =>   'Mitsubishi',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('marcas')->insert([
            'nome'           =>   'Nissan',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('marcas')->insert([
            'nome'           =>   'Porsche',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('marcas')->insert([
            'nome'           =>   'Ssangyong',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('marcas')->insert([
            'nome'           =>   'Suzuki',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('marcas')->insert([
            'nome'           =>   'Troller',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('marcas')->insert([
            'nome'           =>   'Volvo',
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);



    }
}
