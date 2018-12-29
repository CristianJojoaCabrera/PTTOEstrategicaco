<?php

use Illuminate\Database\Seeder;
use \App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Felipe Arciniegas',
            'email' => 'mfelipeaq@gmail.com',
            'cell_phone'=>'3134817859',
            'password' => bcrypt('mfelipeaq'),
            'occupation' =>'Administrador',
        ]);


        $user = User::create([
            'name' => 'Jordy Chimbi',
            'email' => 'jordychimbi@gmail.com',
            'cell_phone'=>'3105044845',
            'password' => bcrypt('jordychimbi'),
            'occupation' =>'Administrador',
        ]);


        $user = User::create([
            'name' => 'Jairo Contreras',
            'email' => 'jcontreras@gmail.com',
            'cell_phone'=>'3158589642',
            'password' => bcrypt('jcontreras'),
            'occupation' =>'Administrador',
        ]);


        $user = User::create([
            'name' => 'Cristian Jojoa',
            'email' => 'cristianjojoa01@gmail.com',
            'cell_phone'=>'3195600375',
            'password' => bcrypt('cristian'),
            'occupation' =>'Administrador',
        ]);

    }
}
