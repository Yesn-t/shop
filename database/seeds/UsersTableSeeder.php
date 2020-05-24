<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                      'email' => 'admin@admin.com',
                      'email_verified_at' => now(),
                      'country' => '-',
                      'state' => '-',
                      'mobile' => '0000000000',
                      'password' => Hash::make('..J4m0n..')]);

        factory(App\User::class, 20)->create();
    }
}
