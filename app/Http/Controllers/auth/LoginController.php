<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;

class LoginController extends Controller
{
    use HasRoles;
    
    public function index()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect('/login')->withErrors($validator)->withInput();
        }


        if (Auth::attempt($credentials)) {
            /** @var \App\Models\User */
            $user = auth()->user();
            $name = auth()->user()->name;

            if ($user->status === 'blocked') {
                Auth::logout();
                return redirect('/')->withErrors(['error' => 'Your account is blocked.']);
            }    

            if ($user->hasRole('admin') || $user->hasRole('petugas')) {
                return redirect('/dashboard/analytics')->with(['success' => "$name Login successfully"]);
            } elseif ($user->hasRole('peminjam')) {
                return redirect('/')->with(['success' => "$name Login successfully"]);
            } else {
                return redirect('/')->withErrors(['error' => 'Login failed. Please check your credentials.']);
            }
        }
        return redirect('/')->withErrors(['error' => 'Login failed. Please check your credentials.']);
    }    
}
