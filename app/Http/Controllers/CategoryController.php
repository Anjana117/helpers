<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\Category\CategoryRepository;
class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $CategoryRepository)
    {
        $this->categoryRepository = $CategoryRepository;
    }


    public function index()
    {
        return view('category.category');
    }

    public function showCategory()
    {
        $category = Category::all();

        return view('category.showcategory', compact('category'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
            $this->categoryRepository->store($request->all());

            return redirect('/category/show')->with('success', 'Category and Product added successfully!');
        } catch (\Exception $ex) {
            Log::error('Error saving data: ' . $ex->getMessage());

            return redirect()->back()->with('error', 'Failed to save data. Please try again.');
        }
    }
}
