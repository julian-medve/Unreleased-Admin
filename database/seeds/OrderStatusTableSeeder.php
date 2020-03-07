<?php

use Illuminate\Database\Seeder;
use App\Models\OrderStatus;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        OrderStatus::create(['Name'  => 'Pending Payment', 'AppColor' => '226, 226, 226, 255']);
        OrderStatus::create(['Name'  => 'On Process', 'AppColor'=> '221, 93, 0, 255']);
        OrderStatus::create(['Name'  => 'Shipping', 'AppColor'=> '221, 93, 0, 255']);
        OrderStatus::create(['Name'  => 'Delivered', 'AppColor'=> '5, 111, 1, 255']);
    }
}
