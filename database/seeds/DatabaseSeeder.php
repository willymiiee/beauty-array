<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'willymiiee',
            'name' => 'Willy Nugraha',
            'email' => 'willymiiee@gmail.com',
            'password' => bcrypt('sayajancukbanget'),
            'is_confirmed' => true
        ]);
    }
}
