<?php

use Illuminate\Database\Seeder;
use App\Modelos\Licenciatura;

class LicenciaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Licenciatura = new Licenciatura;
        $Licenciatura->nombre='Lic. En Derecho';
        $Licenciatura->nivel_id=2;
        $Licenciatura->save();

        $Licenciatura = new Licenciatura;
        $Licenciatura->nombre='Lic. En Finanzas';
        $Licenciatura->nivel_id=2;
        $Licenciatura->save();

        $Licenciatura = new Licenciatura;
        $Licenciatura->nombre='Mtria. Admon. De Negocios';
        $Licenciatura->nivel_id=3;
        $Licenciatura->save();

        $Licenciatura = new Licenciatura;
        $Licenciatura->nombre='Mtria. Direccion de proyectos';
        $Licenciatura->nivel_id=3;
        $Licenciatura->save();
    }
}
