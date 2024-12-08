<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat Permissions
        Permission::create(['name' => 'can-send']);  // untuk user yang bisa mengirim uang
        Permission::create(['name' => 'can-withdraw']);  // untuk admin yang bisa melakukan penarikan

        // Membuat Roles
        $userRole = Role::create(['name' => 'user']);
        $adminRole = Role::create(['name' => 'admin']);

        // Memberikan Permissions ke Roles
        $userRole->givePermissionTo('can-send');  // hanya user yang bisa mengirim uang
        $adminRole->givePermissionTo('can-withdraw');  // hanya admin yang bisa melakukan penarikan

        // Membuat User dan Admin
        // Buat user dan assign role user
        $user = User::create([
            'name' => 'User Test',
            'email' => 'user@test.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('user');

        // Buat admin dan assign role admin
        $admin = User::create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => bcrypt('password')
        ]);
        $admin->assignRole('admin');
    }
}