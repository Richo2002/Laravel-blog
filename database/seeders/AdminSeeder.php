<?php

namespace Database\Seeders;

use App\Models\User;
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
        $password = 'Boolean';
        User::create([
            'pseudo' => 'Richodev',
            'password' => Hash::make($password),
            'image_id' => 1,
        ]);
    }
}
