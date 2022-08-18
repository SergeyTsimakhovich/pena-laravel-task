<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRoles = [
            [
                'name' => 'admin',
                'role' => 'admin'
            ],
            [
                'name' => 'user',
                'role' => 'user'
            ]
        ];

        foreach ($userRoles as $userRole)
        {
            $user = User::query()->where('name', $userRole['name'])->first();
            $role = Role::query()->where('name', $userRole['role'])->first();

            UserRole::query()->create(
                [
                    'user_id' => $user->id,
                    'role_id' => $role->id,
                ]
            );
        }
    }
}
