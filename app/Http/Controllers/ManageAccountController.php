<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ApproveAccount;
use Illuminate\Http\Request;
use App\Jobs\SendApprovalEmail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\auth\RegisterController;

class ManageAccountController extends Controller
{
    public function index()
    {
        $registerController = new RegisterController();

        $provinsi = $registerController->getProvinsi();
        $getRoles= Role::whereNotIn('name', ['admin'])->get();

        $getUser = User::with('anggota')->where(function($query){
            $query->where('role','petugas')->orWhere('role','peminjam');
        })->whereIn('status', ['active','blocked'])->orderBy('created_at', 'desc')->get();

        return view('admin.manageAccount', compact('getUser', 'provinsi', 'getRoles'));
    }

    public function changeStatus(Request $request)
    {
        try {
            $userId = $request->input('user_id');
            $currentStatus = $request->input('current_status');
        
            $user = User::findOrFail($userId);
        
            if ($currentStatus === 'active') {
                $user->status = 'blocked';
            } else {
                $user->status = 'active';
            }
        
            $user->save();
        
            return response()->json(['message' => 'Update Berhasil']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal memperbarui status: ' . $th->getMessage());
        }
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

            $imagePath = public_path('assets/home/cdn/shop/t/9/assets/logo.png');

            SendApprovalEmail::dispatch($getuser, $imagePath)->onQueue('emails');
          
            return redirect()->back()->with(['success' => "User berhasil diapprove."],200);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }
}
