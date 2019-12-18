<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'          => 'admin tokohalal',
            'email'         => 'admin@etokohalal.com',
            'password'      => bcrypt('12345678'),
            'user_type'     => 'Admin'
        ]);

        User::create([
            'name'          => 'Dandi Fermeko',
            'email'         => 'dandifermeko@gmail.com',
            'password'      => bcrypt('12345678'),
            'user_type'     => 'User'
        ]);
    }
}
