<?php

use Illuminate\Database\Seeder;
use App\Modelos\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Genero = new Genero;
        $Genero->nombre='Masculino';
        $Genero->save();

        $Genero = new Genero;
        $Genero->nombre='Femenino';
        $Genero->save();
    }
}
