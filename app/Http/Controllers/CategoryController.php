<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\CategoryRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
     
        $this->middleware('auth')->only(['store', 'show','index']);

        $this->categoryRepository = $categoryRepository;
    }


    public function index()
    {
        return view('category.category');
    }
    public function show()
{
    $categories = Category::all();
    return view('category.showcategory', compact('categories'));
}

    public function store(CategoryRequest $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to perform this action.');
        }
        else{
            $this->categoryRepository->store($request->all());
            return redirect()->route('categories.show')->with('success', 'Category added successfully!');
       
        }
        }
}
