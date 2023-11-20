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
            [
                'name' => '2005551101',
                'email' => '2005551101',
                'password' => Hash::make('2005551101'),
            ],
            [
                'name' => '2005551091',
                'email' => '2005551091',
                'password' => Hash::make('2005551091'),
            ],
        ]);
    }
}
