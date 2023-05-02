<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $heading = true;
        $input_file = fopen(base_path("database/data/datafurniture.csv"), "r");
        while (($record = fgetcsv($input_file, null, ",")) !== FALSE) {
            if (!$heading) {
                $product = array(
                    "name_product" => $record['0'],
                    "category" => $record['1'],
                    "description" => $record['2'],
                    "sku" => $record['3'],
                    "price" => $record['4'],
                    "image" => $record['5'],
                );
                // dd($product);
                Product::create($product);
            }
            $heading = false;
        }
        fclose($input_file);
    }
}
