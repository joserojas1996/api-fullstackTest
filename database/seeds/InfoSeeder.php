<?php

use App\Models\Address;
use App\Models\Info;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = app(Generator::class);
        $address = Address::all();
        for ($i = 1; $i <= 20; $i++) {
            Info::create([
                'rut' => $faker->numerify('########-#'),
                'name' => $faker->firstname,
                'lastname' => $faker->lastname,
                'phone' => $faker->phoneNumber,
                'address_id' => $address->random()->id,
                'infoable_id' => $i,
                'infoable_type' => 'App\Models\User'
            ]);
        }

        for ($i = 1; $i <= 100; $i++) {
            Info::create([
                'rut' => $faker->numerify('########-#'),
                'name' => $faker->firstname,
                'lastname' => $faker->lastname,
                'phone' => $faker->phoneNumber,
                'address_id' => $address->random()->id,
                'infoable_id' => $i,
                'infoable_type' => 'App\Models\Client'
            ]);
        }

        for ($i = 1; $i <= 100; $i++) {
            Info::create([
                'rut' => $faker->numerify('########-#'),
                'name' => $faker->firstname,
                'lastname' => $faker->lastname,
                'phone' => $faker->phoneNumber,
                'address_id' => $address->random()->id,
                'infoable_id' => $i,
                'infoable_type' => 'App\Models\Provider'
            ]);
        }
    }
}
