<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\KategoriRelasi;
use App\Models\KoleksiPribadi;
use App\Models\UlasanBuku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Buku::paginate(10);
        
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

        $review = UlasanBuku::where('buku_id',$id)->get();
        $countReview = $review->count();
        $sumReview = $review->sum('rating');

        $averageRating = 0;
        if ($countReview > 0) {
            $averageRating = ($sumReview / $countReview);
            $averageRating = round($averageRating, 2);
            $averageRating = max(min($averageRating, 5.0), 1.0);
        }


        $kategoriIds = $book->kategorirelasi()->pluck('kategori_id')->toArray();
        
        $categoryBook = KategoriBuku::whereIn('id', $kategoriIds)->get();

        $relatedBooks = Buku::whereHas('kategorirelasi', function ($query) use ($kategoriIds) {
            $query->whereIn('kategori_id', $kategoriIds);
        })
        ->where('id', '!=', $book->id) 
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        return view('home.detail', compact('book','wishlist', 'countwishlist','relatedBooks','review', 'averageRating', 'countReview', 'categoryBook'));
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

    public function storeUlasan(Request $request)
    {
        try {
            $bukuId = $request->input('buku_id');
            $userId = auth()->user()->id;

            $storeReview = new UlasanBuku();
            $storeReview->user_id = $userId;
            $storeReview->buku_id = $bukuId;
            $storeReview->ulasan = $request->input('ulasan');
            $storeReview->rating = $request->input('rating');
            $storeReview->save();

            return response()->json(['success' => true], 200);
        } catch (\Throwable $th) {
            return  response()->json(['error' => 'Error: ' . $th->getMessage()], 500);
        }
    }
}
