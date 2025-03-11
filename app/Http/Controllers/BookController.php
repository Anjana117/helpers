<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function showUsers(Book $book)
    {
      $users= $book->users();
      //dd($users);
      return view('books.users', compact('book', 'users'));
    }
    public function index()
    {
        $books = Book::all();
        $users = User::all();
        return view('books.index', compact('books', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
        ]);

        Book::create($request->only(['name', 'author']));
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function attachUser(Request $request, Book $book)
    {
        $book->users()->attach($request->user_id);
        return redirect()->route('book.users', ['book' => $book->id])->with('success', 'User assigned to book!');
    }

}
