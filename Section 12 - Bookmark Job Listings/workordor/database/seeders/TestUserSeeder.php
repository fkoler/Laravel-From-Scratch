<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

use Carbon\Carbon;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return \App\Models\User
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Peter Steele',
            'email' => 'peter@steele.io',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12341234'),
        ]);

        return $user;
    }
}
