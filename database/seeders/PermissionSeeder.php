<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

    $permissions = [

        'admin' => [
            'can_access_dashboard',
        ],

        'seller' => [
            'can_set_up_seller_profile',
            'can_view_seller_profile',
            'can_edit_seller_profile',
            'can_daily_report',
            'can_transaction_report',
        ]
        
    ];

    foreach ($permissions as $group => $permissionList) {
        foreach ($permissionList as $permission) {
            Permission::create(['name' => $permission, 'group' => $group]);
        }
    }
    }
}
