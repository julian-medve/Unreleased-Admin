<?php

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserroleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create(['role'  => Config('Constants.userrole.admin')]);
        UserRole::create(['role'  => Config('Constants.userrole.submitter')]);
        UserRole::create(['role'  => Config('Constants.userrole.customer')]);
    }
}
