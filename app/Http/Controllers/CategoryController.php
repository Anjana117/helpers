<?php

namespace App\Http\Controllers;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories =  $this->categoryRepository->getAll();
        return view('category.category', compact('categories'));
    }

    public function delete($id)
    {
       $categoryId = $this->categoryRepository->getCategoryId($id);
       $categoryId->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully!');
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->store($request->all());
        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }
}
