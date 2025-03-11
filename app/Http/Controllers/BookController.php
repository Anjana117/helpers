<?php

namespace App\Http\Controllers;
use App\Repositories\Book\BookRepository;
use App\Repositories\User\UserRepository;
use App\Http\Requests\BookRequest;



class BookController extends Controller
{
    protected $bookRepository;
    protected $userRepository;

    public function __construct(BookRepository $bookRepository, UserRepository $userRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->userRepository = $userRepository;

    }

      public function index()
    {
        $users = $this->userRepository->getAll();
        return view('books.index', compact('users'));
    }

    public function show()
    {
        $users =$this->userRepository->getAll();
        return view('books.users', compact('users'));
    }

    public function store(BookRequest $request)
    {
        $book= $this->bookRepository->store($request->all());
         $book->users()->attach($request->user_id);
         return redirect()->route('books.show')->with('success', 'Book added successfully!');
    }

}
