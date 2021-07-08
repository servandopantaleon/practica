<?php

use Illuminate\Database\Seeder;
use App\Modelos\Nivel;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $nivel = new Nivel;
        $nivel->nombre='Preparatoria';
        $nivel->save();

        $nivel = new Nivel;
        $nivel->nombre='Licenciatura';
        $nivel->save();

        $nivel = new Nivel;
        $nivel->nombre='Posgrado';
        $nivel->save();
        
    }
}
