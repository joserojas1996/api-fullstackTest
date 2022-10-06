<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CitySeeder::class,
            CommuneSeeder::class,
            AddressSeeder::class,
            UserTableSeeder::class,
            ProviderSeeder::class,
            ClientSeeder::class,
            SubsidiarySeeder::class,
            ProductSeeder::class,
            InfoSeeder::class
        ]);
    }
}
