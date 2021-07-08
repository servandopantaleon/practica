<?php

use Illuminate\Database\Seeder;
use App\Modelos\EstadoCivil;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Estado_civil = new EstadoCivil;
        $Estado_civil->nombre='Soltero/a';
        $Estado_civil->save();

        $Estado_civil = new EstadoCivil;
        $Estado_civil->nombre='Casado/a';
        $Estado_civil->save();

        $Estado_civil = new EstadoCivil;
        $Estado_civil->nombre='Divorciado/a';
        $Estado_civil->save();

        $Estado_civil = new EstadoCivil;
        $Estado_civil->nombre='Viudo/a';
        $Estado_civil->save();
    }
}
