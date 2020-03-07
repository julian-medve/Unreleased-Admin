<?php

use Illuminate\Database\Seeder;
use App\Models\TypeCategory;

class TypeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeCategory::create([ 'Name' => 'Floral', 'Description' => 'Floral Description' ]);
        TypeCategory::create([ 'Name' => 'Tribal', 'Description' => 'Tribal Description' ]);
    }
}
