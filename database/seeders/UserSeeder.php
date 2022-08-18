<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.ru'
            ],
            [
                'name' => 'user',
                'email' => 'user@user.ru'
            ],
        ];

        foreach ($users as $user)
        {
            $user['password'] = Hash::make('12345678');

            User::query()->create($user);
        }
    }
}
