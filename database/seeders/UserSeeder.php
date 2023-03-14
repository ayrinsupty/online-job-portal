<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();

        $admin = Admin::where('email', 'ayrinsupty@hotmail.com')->first();
        if (is_null($admin)) {
            $admin = new Admin();
            $admin->name = "Ayrin Supty";
            $admin->slug = "Supty";
            $admin->username = "supty";
            $admin->phone = "01615336546";
            $admin->email = "ayrinsupty@hotmail.com";
            $admin->password = Hash::make('12345678');
            $admin->status = Admin::$statusArrays[0];;
            $admin->save();
        }


        foreach (range(1, 5) as $key => $index) {
            $user = User::where('email', 'ayrinsupty@hotmail.com')->first();
            $user = new User();
            if (is_null($user)) {
                $user->first_name = "Ayrin";
                $user->last_name = "Supty";
                $user->username = "supty";
                $user->email =  "ayrinsupty@hotmail.com";
            } else {
                $user->first_name = $faker->name;
                $user->last_name = $faker->name;
                $user->username = $faker->userName;
                $user->email = $faker->email;
            }
            $user->phone = $faker->phoneNumber;
            $user->address = "Dhaka";
            $user->image = $faker->imageUrl;
            $user->save();
        }
    }
}
