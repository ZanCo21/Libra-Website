<?php

namespace App\Http\Controllers;

use App\Http\Controllers\auth\RegisterController;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ManageAccountController extends Controller
{
    public function index()
    {
        $registerController = new RegisterController();

        $provinsi = $registerController->getProvinsi();
        $getRoles= Role::whereNotIn('name', ['admin'])->get();

        $getUser = User::with('anggota')->where(function($query){
            $query->where('role','petugas')->orWhere('role','peminjam');
        })->where('status', 'active')->orderBy('created_at', 'desc')->get();

        return view('admin.manageAccount', compact('getUser', 'provinsi', 'getRoles'));
    }

    public function requestAccount()
    {
        $getUser = User::with('anggota')->where('status', 'pending')->orderBy('created_at', 'asc')->get();

        return view('admin.manageRequestAccount', compact('getUser'));
    }

    public function approveAccount(Request $request)
    {
        try {
            $getuser = User::findOrFail($request->user_id);

            $getuser->update([
                'status' => 'active',
            ]);
          
            return redirect()->back()->with(['success' => "User berhasil diapprove."],200);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }
}
