<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function index()
    {

        $provinsi = $this->getProvinsi();

        return view('auth/register', compact('provinsi')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,userName',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'nama_lengkap' => 'required|string',
            'no_telephone' => 'required|string',
            'jenis_kelamin' => 'required|in:male,female',
            'jenis_kartu_identitas' => 'required|string',
            'no_identitas' => 'required|string',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $user = User::create([
            'userName' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'peminjam',
        ]);

        $anggota = Anggota::create([
            'user_id' => $user->id,
            'nama_lengkap' => $request->nama_lengkap,
            'no_identitas' => $request->no_identitas,
            'jenis_kartu_identitas' => $request->jenis_kartu_identitas,
            'no_telephone' => $request->no_telephone,
            'jenis_kelamin' => $request->jenis_kelamin,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'alamat' => $request->alamat,
        ]);

        $peminjamRole = Role::findByName('peminjam');
        $user->assignRole($peminjamRole);



        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function getProvinsi()
    {
         $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');

         if ($response->successful()) {
             return $response->json();
         } else {
             return response()->json(['error' => 'Failed to fetch provinces'], $response->status());
         }
    }

    public function getKota($id)
    {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/$id.json");


        if ($response->successful()) {
            return $response->json();
        }else{
            return response()->json(['error' => 'Failed to fetch kota'], $response->status());
        }
    }

    public function getKecamatan($id)
    {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/districts/$id.json");


        if ($response->successful()) {
            return $response->json();
        }else{
            return response()->json(['error' => 'Failed to fetch kecamatan'], $response->status());
        }
    }

    public function getKelurahan($id)
    {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/villages/$id.json");


        if ($response->successful()) {
            return $response->json();
        }else{
            return response()->json(['error' => 'Failed to fetch kecamatan'], $response->status());
        }
    }
}
