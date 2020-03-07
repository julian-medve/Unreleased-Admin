<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'          => 'Super Administrator',
            'email'         => 'super@gmail.com',
            'password'      => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'          => Config('Constants.userrole.super_admin'), 
        ]);

        User::create([
            'name'          => 'Sotnikov Uri',
            'email'         => 'admin@gmail.com',
            'password'      => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'          => Config('Constants.userrole.admin'), 
        ]);

        User::create([
            'name'          => 'Pattern Submitter',
            'email'         => 'submitter@gmail.com',
            'password'      => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'          => Config('Constants.userrole.submitter'),
        ]);

        User::create([
            'name'          => 'Customer',
            'email'         => 'customer@gmail.com',
            'password'      => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'          => Config('Constants.userrole.customer'), 
        ]);
    }
}
