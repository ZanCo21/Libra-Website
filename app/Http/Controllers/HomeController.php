<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Buku::all();
        return view('home', compact('books'));
    }

    public function show($id)
    {

        $book = Buku::findOrFail($id);

        return view('home.detail', compact('book'));
    }
}
