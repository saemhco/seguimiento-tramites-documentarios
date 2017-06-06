<?php

use Illuminate\Database\Seeder;

class FacultadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
        DB::table('facultads')->insert([
            'nombre' => 'Enfermería'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Ing. Industrial y Sistemas'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Medicina'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Ciencias Agrarias'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Ing. Civil y Arquitectura'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Obstetricia'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Ciencias de la Educación'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Psicología'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Med. Veterinaria y Zootecnía'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'CS. Administrativas Y Turismo'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Derecho y Cs. Políticas'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Cs. Económicas'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Cs. Contables y Financieras'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Ciencias Sociales'
        ]);
        DB::table('facultads')->insert([
            'nombre' => 'Super Administrador'
        ]);
    }
}
