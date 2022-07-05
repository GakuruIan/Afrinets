<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
         
        Customer::create([
             'name'=>'Ian Ngige',
             'email'=>'ian@gmail.com',
             'nationalID'=>14568583,
             'checkout'=>'2022-06-4',
             'checkin'=>'2022-06-2',
              'payment_method'=>'visa'
         ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
