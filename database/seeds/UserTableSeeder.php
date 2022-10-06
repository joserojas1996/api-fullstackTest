<?php

use App\Models\Address;
use App\Models\Client;
use App\Models\Info;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create();

        $user = User::create([
            'date_birth' => '2022-10-08',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123')
        ]);

        $user->info()->create([
            'rut' => '23181150-8',
            'name' => 'Super',
            'lastname' => 'Admin',
            'phone' => '+584144693616',
            'address_id' => 10
        ]);
    
    }
}
