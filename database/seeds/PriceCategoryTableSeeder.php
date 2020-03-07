<?php

use Illuminate\Database\Seeder;
use App\Models\PriceCategory;

class PriceCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PriceCategory::create(['Name'=> 'High', 'Description'=> 'above 3000']);
        PriceCategory::create(['Name'=> 'Medium', 'Description'=> 'below 3000 and above 1000']);
        PriceCategory::create(['Name'=> 'Low', 'Description'=> 'below 1000']);
    }
}
