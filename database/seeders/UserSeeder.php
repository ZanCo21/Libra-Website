<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        $dataAdmin = collect([
            [
                'userName' => "admin",
                'email' => "admin@gmail.com",
                'role' => 'admin'
            ],
            [
                'userName' => "peminjam",
                'email' => "peminjam@gmail.com",
                'role' => 'peminjam'
            ],

        ]);
        $dataAdmin->map(function ($data) {
            $userName = $data['userName'];
            $email = $data['email'];
            $role = $data['role'];
            $number_verified_at = now();
            $password = bcrypt('123');

            $admin = User::create([
                'userName' => $userName,
                'email' => $email,
                'role' => $role,
                'number_verified_at' => $number_verified_at,
                'password' => $password,
            ]);

            if ($role == 'peminjam') {
                Anggota::create([
                    'user_id' => $admin->id,
                    'nama_lengkap' => 'Peminjam Peminjam',
                    'no_identitas' => '92883728326372',
                    'jenis_kartu_identitas' => 'KTP',
                    'alamat' => 'JL.Pekapuran Rt.01 Rw.19 Kec.Sukmajawa Kel.abadijaya kota Depok',
                    'no_telephone' => '089926166212',
                ]);
            }

            if ($role == 'admin') {
                $adminRole = Role::findByName('admin');
                $admin->assignRole($adminRole);
            }else{
                $adminRole = Role::findByName('peminjam');
                $admin->assignRole($adminRole);
            }
            
        });
    }
}