<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discount::truncate();
        $heading = true;
        $input_file = fopen(base_path("database/data/datadiscount.csv"), "r");
        while (($record = fgetcsv($input_file, null, ",")) !== FALSE) {
            if (!$heading) {
                $product = array(
                    "name_discount" => $record['0'],
                    "percentage" => $record['1'],
                );
                // dd($product);
                Discount::create($product);
            }
            $heading = false;
        }
        fclose($input_file);
    }
}
