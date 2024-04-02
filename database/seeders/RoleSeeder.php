<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
           // Membuat peran "admin" dan "seller"
           $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
           $sellerRole = Role::create(['name' => 'petugas', 'guard_name' => 'web']);
           $sellerRole = Role::create(['name' => 'peminjam', 'guard_name' => 'web']);
            // Mendapatkan semua izin (permissions) yang telah dibuat
            // $permissions = Permission::all();
                
            // // Mengaitkan izin dengan peran yang sesuai
            // $adminRole->syncPermissions($permissions->where('group', 'admin'));
            // $sellerRole->syncPermissions($permissions->where('group', 'seller'));
    }
}
