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
        //

            User::create([
                'name' => 'Transisi',
                'email' => 'admin@transisi.id ',
                'email_verified_at' => now(),
                'password' => bcrypt('transisi'),
                'created_at' => now()
            ]);
        
    }
}
