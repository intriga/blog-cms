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
        factory(App\User::class, 29)->create();

        App\User::create([
            'name' => 'Intriga',
            'email' => 'intriga@correo.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
