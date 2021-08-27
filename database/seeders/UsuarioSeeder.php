<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email'=>'teste@teste.com',
            'password'=>Hash::make('12345678')
        ]);
    }
}
