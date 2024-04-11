<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KoleksiPribadi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Buku::all();

        $wishlist = [];
        $countwishlist = 0;
    
        if(auth()->check()) {
            $userId = auth()->user()->id;
            $wishlist = KoleksiPribadi::where('user_id', $userId)->get();
            $countwishlist = KoleksiPribadi::where('user_id', $userId)->count();
        }

        return view('home', compact('books', 'wishlist', 'countwishlist'));
    }

    public function show($id)
    {
        $book = Buku::findOrFail($id);
        $userId = auth()->user()->id;
        $wishlist = KoleksiPribadi::where('user_id', $userId)->get();
        $countwishlist = KoleksiPribadi::where('user_id', $userId)->count();

        return view('home.detail', compact('book','wishlist', 'countwishlist'));
    }

    public function storeWishList(Request $request)
    {
        try {
            $bukuId = $request->input('buku_id');
            $userId = auth()->user()->id;

            $existingWishlist = KoleksiPribadi::where('user_id', $userId)
            ->where('buku_id', $bukuId)
            ->first();

            if ($existingWishlist) {
            return response()->json(['error' => 'Buku sudah ada dalam WishList.'], 400);
            }
            
            $wishlist = new KoleksiPribadi();
            $wishlist->user_id = $userId;
            $wishlist->buku_id = $bukuId;
            $wishlist->save();
    
            return response()->json(['success' => true], 200);
        } catch (\Throwable $th) {
            return  response()->json(['error' => 'Error: ' . $th->getMessage()], 500);
        }
    }

    public function deleteWishList(Request $request)
    {
        try {
            $bukuId = $request->input('buku_id');
            $userId = auth()->user()->id;

            $existingWishlist = KoleksiPribadi::where('user_id', $userId)
            ->where('buku_id', $bukuId)
            ->delete();
    
            return response()->json(['success' => true], 200);
        } catch (\Throwable $th) {
            return  response()->json(['error' => 'Error: ' . $th->getMessage()], 500);
        }
    }
}
