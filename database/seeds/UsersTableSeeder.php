<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombre' =>'Juanjo',
            'apellido' =>'Diaz',
            'email' =>'diazjuanjose@icloud.com',
            'rol' =>'admin',
            'password' =>bcrypt('12341234')
        ]);
    }
}
