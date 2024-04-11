<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SellerSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            KategoriSeeder::class,
            BukuSeeder::class,
            KategoriRelasiSeeder::class,
            // SellerSeeder::class,
            // CategoriesSeeder::class,
            // ProductSeeder::class,
        ]);
    }
}
