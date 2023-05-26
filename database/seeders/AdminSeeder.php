<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $heading = true;
        $input_file = fopen(base_path("database/data/dataadmin.csv"), "r");
        while (($record = fgetcsv($input_file, null, ",")) !== FALSE) {
            if (!$heading) {
                $user = array(
                    "email" => $record['0'],
                    "username" => $record['1'],
                    "password" => Hash::make(($record['2'])),
                    "first_name" => $record['3'],
                    "last_name" => $record['4'],
                    "gender" => $record['5'],
                    "address" => $record['6'],
                    "telephone" => $record['7'],
                    "is_admin" => $record['8'],
                );
                User::create($user);
            }
            $heading = false;
        }
        fclose($input_file);
    }
}
