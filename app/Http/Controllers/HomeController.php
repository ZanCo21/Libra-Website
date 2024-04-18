<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Denda;
use App\Models\Peminjaman;
use App\Models\UlasanBuku;
use App\Jobs\SendDendaEmail;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use App\Models\KategoriRelasi;
use App\Models\KoleksiPribadi;
use App\Models\DetailPeminjaman;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $booksQuery = Buku::query();
        $getCategory = KategoriBuku::all();

        if ($request->has('category')) {
            $categoryId = $request->category;
            $booksQuery->whereHas('kategorirelasi', function ($query) use ($categoryId) {
                $query->where('kategori_id', $categoryId);
            });
        }    
        
        $books = $booksQuery->paginate(10);
        $countBooks = Buku::count();

        $wishlist = [];
        $countwishlist = 0;
        $reserveBook = [];
        
        if(auth()->check()) {
            $userId = auth()->user()->id;
            $wishlist = KoleksiPribadi::where('user_id', $userId)->get();
            $countwishlist = KoleksiPribadi::where('user_id', $userId)->count();

            $reserveBook = Peminjaman::with('DetailPeminjaman')
            ->whereHas('DetailPeminjaman', function ($query) use ($userId) {
                $query->where('user_id', $userId)
                    ->whereIn('status_peminjaman', ['reserved', 'borrowed', 'overdue','returned']);
            })->get();
        }

        return view('home', compact('books', 'wishlist', 'countwishlist', 'countBooks', 'getCategory','reserveBook'));
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

    public function storeUlasanMultiple(Request $request)
    {
        $userId = auth()->user()->id;

        foreach ($request->bookid as $index => $bookId) {
            $review = new UlasanBuku();
            $review->user_id = $userId;
            $review->buku_id = $bookId;
            if (isset($request->star[$index])) {
                $review->rating = $request->star[$index];
            }
            if (isset($request->ulasan[$index])) {
                $review->ulasan = $request->ulasan[$index];
            }
            $review->save();
        }

        DetailPeminjaman::whereIn('id', $request->detailpeminjamanid)->update(['status_peminjaman' => 'done']);

        return redirect()->route('home')->with('success', 'Ulasan berhasil disimpan.');
    }
}
