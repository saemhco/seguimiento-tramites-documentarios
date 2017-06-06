<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
                'name' => 'Super Usuario',
                'dni' => '48315690',
                'email' => 'aescandonmunguia@hotmail.com',
                'password' => bcrypt('2012110690saem'),
                'foto' => 'admin.png',
                'funcion' => 'Super Admin',
                'oficinas_id' => '1'
        ]);

        for ($i=2; $i < 16; $i++) { 
            
            DB::table('users')->insert([
                'name' => 'Sra. Decana',
                'dni' => '000000'."$i",
                'email' => 'decano'."$i".'@hotmail.com',
                'password' => bcrypt('unheval-enfermeria'),
                'foto' => 'decano.png',
                'funcion' => 'Decano(a)',
                'oficinas_id' => "$i"
        ]);

        }
    }
}
