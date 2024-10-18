<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = config("brands");

        foreach ($brands as $brand) {
            $new_brand = new Brand();
            
            $new_brand->name = $brand['name'];
            $new_brand->phone = $brand['phone'];
            $new_brand->address = $brand['address'];
            $new_brand->thumb = $brand['thumb'] ?? null;
            
            $new_brand->save();
        } 
    }
}
