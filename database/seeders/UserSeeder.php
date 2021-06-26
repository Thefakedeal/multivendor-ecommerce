<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    protected $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=> '$2y$10$q0ww0u0t5v9kCSDGjyuSue6Rm7tMiSx.PTTxHdwwBwR5tjFMSSozu', //admin
            'user_role'=>2
        ]);

        User::firstOrCreate([
            'name'=>'Vendor',
            'email'=>'veldor@vendor.com',
            'password'=> '$2y$10$Nt96296z4z/akCvGbAuLx.FxupnBspHOxnPj0DHW3OoZLepRFPi4y', //vendor
            'image' => 'images/tests/vendors/vendor1.jpg',
            'user_role'=>1
        ]);

        User::firstOrCreate([
            'name'=>'User',
            'email'=>'user@user.com',
            'password'=> '$2y$10$SEU.oCFLADxFU.VLmu662uLFAc/bOtAG9w6Odb1Qhh6dEea9DFdOy', //user
            'user_role'=>0
        ]);

        User::factory()->count(100)
        ->state(
            fn()=>[
                'user_role'=> 1,
                'image' => 'images/tests/vendors/vendor'.rand(1,17).'.jpg',
            ]
        )->create();
    }
}
