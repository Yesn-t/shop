<?php

use App\User;
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
        User::create(['name' => 'Admin',
                      'email' => 'a@a.com',
                      'email_verified_at' => now(),
                      'country' => 'Mexico',
                      'state' => 'Jalisco',
                      'mobile' => '3311442288',
                      'password' => 'aA123456.']);

        factory(App\User::class, 20)->create();
    }
}
