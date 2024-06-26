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
                'email' => "alghifari211005@gmail.com",
                'role' => 'peminjam',
                'nama_lengkap' => 'Peminjam Satu',
                'no_identitas' => '11111111111111'
            ],
            [
                'userName' => "peminjam2",
                'email' => "peminjam2@gmail.com",
                'role' => 'peminjam',
                'nama_lengkap' => 'Peminjam Dua',
                'no_identitas' => '22222222222222'
            ],
            [
                'userName' => "peminjam3",
                'email' => "peminjam3@gmail.com",
                'role' => 'peminjam',
                'nama_lengkap' => 'Peminjam tiga',
                'no_identitas' => '33333333333331'
            ],
            [
                'userName' => "petugas",
                'email' => "petugas@gmail.com",
                'role' => 'petugas',
                'nama_lengkap' => 'petugas',
                'no_identitas' => '3344333339111'
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
                'status' => 'active',
                'number_verified_at' => $number_verified_at,
                'password' => $password,
            ]);

            if ($role == 'peminjam') {
                Anggota::create([
                    'user_id' => $admin->id,
                    'nama_lengkap' => $data['nama_lengkap'],
                    'no_identitas' => $data['no_identitas'],
                    'jenis_kartu_identitas' => 'KTP',
                    'alamat' => 'JL.Pekapuran Rt.01 Rw.19 Kec.Sukmajawa Kel.abadijaya kota Depok',
                    'no_telephone' => '089926166212',
                    'provinsi' => 'JAWA BARAT',
                    'kota' => 'KOTA DEPOK',
                    'kecamatan' => 'SUKMAJAYA',
                    'kelurahan' => 'ABADIJAYA',
                ]);
            }

            if ($role == 'petugas') {
                Anggota::create([
                    'user_id' => $admin->id,
                    'nama_lengkap' => $data['nama_lengkap'],
                    'no_identitas' => $data['no_identitas'],
                    'jenis_kartu_identitas' => 'KTP',
                    'alamat' => 'JL.Pekapuran Rt.01 Rw.19 Kec.Sukmajawa Kel.abadijaya kota Depok',
                    'no_telephone' => '089926166212',
                    'provinsi' => 'JAWA BARAT',
                    'kota' => 'KOTA DEPOK',
                    'kecamatan' => 'SUKMAJAYA',
                    'kelurahan' => 'ABADIJAYA',
                ]);
            }

            // Kemudian, kita dapat menyesuaikan Seeder untuk menetapkan peran yang sesuai
            if ($role == 'admin') {
                $adminRole = Role::findByName('admin');
            } elseif ($role == 'peminjam') {
                $adminRole = Role::findByName('peminjam');
            } else {
                $adminRole = Role::findByName('petugas');
            }

            // Terakhir, kita tetapkan peran ke pengguna
            $admin->assignRole($adminRole);

            
        });
    }
}
