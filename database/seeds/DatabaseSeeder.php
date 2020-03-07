<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserroleTableSeeder::class);
        $this->call(PriceCategoryTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
