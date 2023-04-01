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
         $user = new User();
                $user->first_name = "Admin";
                $user->last_name = "Admin";
                $user->username = "admin";
                $user->email =  "admin@gmail.com";
                $user->password = Hash::make('12345678');
            $user->phone = $faker->phoneNumber;
            $user->address = "Dhaka";
            $user->image = $faker->imageUrl;
            $user->save();

    }
}
