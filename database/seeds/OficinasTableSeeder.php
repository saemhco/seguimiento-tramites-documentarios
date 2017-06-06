<?php

use Illuminate\Database\Seeder;

class OficinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    			DB::table('oficinas')->insert([
		            'nombre' => 'Administrador',
		            'facultads_id' => '15' 
		        ]);

		        for ($i=1; $i < 15; $i++) { 
			        	DB::table('oficinas')->insert([
			            'nombre' => 'Decanato',
			            'facultads_id' => " $i "
			        ]);

		        }

	}
}