<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class ManageBooksController extends Controller
{
    public function index()
    {
        return view('admin.manageBooks');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahunTerbit' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
            'front_book_cover' => 'required',
        ]);

        try {
            $input = $request->all();


            if ($request->hasFile('front_book_cover')) {
                $photo = $request->file('front_book_cover');
                $booktitle = $input['judul']; 
                $destinationPath = "public/photos/$booktitle";
                $photoName = 'photo_' . uniqid() . '_' . time() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs($destinationPath, $photoName);

                $urlPhoto = 'photos/' . $booktitle . '/' . $photoName;
                $input['front_book_cover'] = $urlPhoto;
            }

            if ($request->hasFile('back_book_cover')) {
                $photo = $request->file('back_book_cover');
                $booktitle = $input['judul']; 
                $destinationPath = "public/photos/$booktitle";
                $photoName = 'photo_' . uniqid() . '_' . time() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs($destinationPath, $photoName);

                $urlPhoto = 'photos/' . $booktitle . '/' . $photoName;
                $input['back_book_cover'] = $urlPhoto;
            }

            Buku::create([
                'judul' => $request['judul'],
                'penulis' => $input['penulis'],
                'penerbit' => $input['penerbit'],
                'tahunTerbit' => $input['tahunTerbit'],
                'stock' => $input['stock'],
                'deskripsi' => $input['deskripsi'],
                'front_book_cover' => $input['front_book_cover'],
                'back_book_cover' => $input['back_book_cover'],
            ]);
            
            return response()->json(['message' => 'Buku berhasil ditambahkan'], 201); 
            // return redirect()->back()->with(['success' => "Berhasil menambahkan buku"]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Buku gagal ditambahkan'], 400);
            //  return redirect()->back()->with(['error' => "Gagal dalam menambahkan buku"]);
        }
    }
}
