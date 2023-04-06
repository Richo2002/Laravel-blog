<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class UserProfil extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'path' => 'logo.png'
        ]);
    }
}
