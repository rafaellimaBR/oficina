<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


            $this->call(ClienteSeeder::class);
            $this->call(MarcaSeeder::class);
            $this->call(ModeloSeeder::class);
            $this->call(ServicoSeeder::class);
            $this->call(CategoriaSeeder::class);
            $this->call(StatusSeeder::class);
            $this->call(ConfiguracaoSeeder::class);

        Model::reguard();
    }
}
