<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->role = "1";
        $admin->name = "Faisal Ahmmed Apon";
        $admin->phone = "+8801307788699";
        $admin->email = "developerfaisal32@gmail.com";
        $admin->password = Hash::make('123456789');
        $admin->status = "1";
        $admin->save();
    }
}
