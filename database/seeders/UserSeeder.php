<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder{
    public function run(){
        User::create([
            'name' => 'Andre Ricardo',
            'email' => 'andre@curso.com',
            'password' => bcrypt('12345678')
        ]);

    }

}
