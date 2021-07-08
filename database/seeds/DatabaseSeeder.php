<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EstadoCivilSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(LicenciaturaSeeder::class);
        $this->call(NivelSeeder::class);
    }
}
