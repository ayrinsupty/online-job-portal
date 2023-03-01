<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
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

        $admin = Admin::where('email', 'ayrinsupty@hotmail.com')->first();
        if (is_null($admin)) {
            $admin = new Admin();
            $admin->name = "Ayrin Supty";
            $admin->username = "supty";
            $admin->phone = "01615336546";
            $admin->email = "ayrinsupty@hotmail.com";
            $admin->password = Hash::make('12345678');
            $admin->status = Admin::$statusArrays[0];;
            $admin->save();
        }
    }
}
