<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Optional;
use Illuminate\Support\Str;

class OptionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $optionals = config('optionals');

        foreach ($optionals as $optional) {
            Optional::create([
                'name' => $optional['name'],
                'slug' => Str::slug($optional['name']),
                'description' => $optional['description'],
                'price' => $optional['price'],
                'thumb' => $optional['thumb'] ?? null,
            ]);
        }
    }
}
