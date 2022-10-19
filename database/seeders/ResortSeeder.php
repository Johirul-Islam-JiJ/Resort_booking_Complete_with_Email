<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resorts')->insert([
            'name' => 'Turag Resort',
            'price' => '2500',
            'location' => 'Bhawal Mirzapur',
            'image' => Str::random(),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, delectus!'
        ]);

        DB::table('resorts')->insert([
            'name' => 'Rupsa Resort',
            'price' => '3500',
            'location' => 'Monipur, Gazipur',
            'image' => Str::random(),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, delectus!'
        ]);

        DB::table('resorts')->insert([
            'name' => 'Anondo Park',
            'price' => '3000',
            'location' => 'Kaliakair, Gazipur',
            'image' => Str::random(),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, delectus!'
        ]);

        DB::table('resorts')->insert([
            'name' => 'Bhawal Resort',
            'price' => '4000',
            'location' => 'Bhawal Mirzapur',
            'image' => Str::random(),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, delectus!'
        ]);

        DB::table('resorts')->insert([
            'name' => 'Bhawal Resort and Spa',
            'price' => '12500',
            'location' => 'Gazipur',
            'image' => Str::random(),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, delectus!'
        ]);

        DB::table('resorts')->insert([
            'name' => 'Rajendra Eco Resort & Village',
            'price' => '16000',
            'location' => 'Gazipur',
            'image' => Str::random(),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, delectus!'
        ]);

        DB::table('resorts')->insert([
            'name' => 'The Base Camp',
            'price' => '6500',
            'location' => ' Rajendrapur, Gazipur',
            'image' => Str::random(),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, delectus!'
        ]);

        DB::table('resorts')->insert([
            'name' => 'Neel Komol Resort',
            'price' => '2500',
            'location' => 'Ratnapur, Gazipur',
            'image' => Str::random(),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, delectus!'
        ]);

        DB::table('resorts')->insert([
            'name' => 'Lakeshore Resort',
            'price' => '5500',
            'location' => 'Kaptai Lake',
            'image' => Str::random(),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, delectus!'
        ]);

        DB::table('resorts')->insert([
            'name' => ' Dhaka Resort',
            'price' => '20500',
            'location' => 'Gazipur',
            'image' => Str::random(),
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, delectus!'
        ]);
    }
}
