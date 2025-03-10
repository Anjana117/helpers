<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('book.book');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);


        Book::create([
            'title' => $request->name,
            'author' => $request->author,
        ]);


        return redirect()->back()->with('success', 'Book added successfully!');
    }
}
