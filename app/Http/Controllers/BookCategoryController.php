<?php

namespace App\Http\Controllers;
use App\Repositories\Book\BookRepository;
use Illuminate\Http\Request;
use App\Repositories\BookCategory\BookCategoryRepository;

class BookCategoryController extends Controller
{
    protected $bookCategoryRepository;
    protected $bookRepository;


    public function __construct(BookCategoryRepository $bookCategoryRepository,BookRepository $bookRepository)
    {
        $this->bookCategoryRepository = $bookCategoryRepository;
        $this->bookRepository = $bookRepository;


    }

      public function index()
    {
        $books = $this->bookRepository->getAll();
        return view('bookscategory.index', compact('books'));
    }

    public function show()
    { $books = $this->bookRepository->getAll();
        $bcategories = $this->bookCategoryRepository->getAll();
        return view('bookscategory.category', compact('bcategories','books'));
    }

    public function store(Request $request)
    {
   $request->validate([
    'name' => 'required|string|max:255',
    'book_id' => 'required|array',
    'book_id.*' => 'exists:books,id'
   ]);
   $bookCategory=$this->bookCategoryRepository->store($request->all());
   $bookCategory->books()->attach($request->book_id);
   return redirect()->route('books.category.show')->with('success', 'Book Category added successfully!');
    }
}
