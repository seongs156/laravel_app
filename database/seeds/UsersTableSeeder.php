<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class,5)->create();
        /*App\User::create([
           'name' => sprintf('%s %s',Str::random(3),Str::random(4)),
            'email' => Str::random(10) . '@example.com',
            'password' => bcrypt('password')
        ]);*/
    }
}
