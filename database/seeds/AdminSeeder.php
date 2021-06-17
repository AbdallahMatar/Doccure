<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'super-admin@doccure.com',
            'mobile' => '0598139833',
            'password' => Hash::make(123456),
            'gender' => 'Male',
            'birth_date' => Carbon::createFromDate(2001, 4, 17),
            'status' => 'Active'
        ]);
    }
}
