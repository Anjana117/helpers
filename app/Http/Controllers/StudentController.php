<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Repositories\Student\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $this->studentRepository->store($request->all());
        return redirect()->back()->with('success', 'Student added successfully!');
    }
    public function view()
    {
        $students=Student::all();
        return view('students.view',compact('students'));
    }
}
