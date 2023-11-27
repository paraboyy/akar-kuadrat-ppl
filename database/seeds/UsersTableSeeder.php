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
        // Generate data range from 2005551001 to 2005551200
        $data = [];
        for ($i = 1001; $i <= 1200; $i++) {
            $userData = [
                'name' => '200555' . $i,
                'email' => '200555' . $i,
                'password' => Hash::make('200555' . $i),
            ];
            $data[] = $userData;
        }

        for ($i = 1001; $i <= 1200; $i++) {
            $userData = [
                'name' => '210555' . $i,
                'email' => '210555' . $i,
                'password' => Hash::make('210555' . $i),
            ];
            $data[] = $userData;
        }

        // Insert the generated data into the 'users' table
        DB::table('users')->insert($data);
    }
}
