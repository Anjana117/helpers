<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Helpers\DateHelper;

class BookIssueController extends Controller
{
    public function show()
    {
        $students = Student::all();
        $books = Book::all();
        return view('bookissue.create', compact('students', 'books'));
    }

    public function index()
    {
        $bookIssues = BookIssue::with('student', 'book')->get();

        return view('bookissue.index', compact('bookIssues'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'student_id' => 'required|exists:students,id',
        //     'book_id' => 'required|exists:books,id',
        //     'issue_date' => 'required|date',
        //     'return_date' => 'nullable|date|after_or_equal:issue_date',
        // ]);
        $issueDate = DateHelper::format($request->issue_date, 'Y-m-d');
        $returnDate = DateHelper::format($request->return_date, 'Y-m-d');

        $bookIssue = BookIssue::create([
            'student_id' => $request->student_id,
            'book_id' => $request->book_id,
            'issue_date' =>$issueDate,
            'return_date' =>$returnDate,
            'status' => 'issued'
        ]);
        $student = Student::find($request->student_id);
        $student->books()->attach($request->book_id);

        return redirect('/bookissue/index')->with('success', 'Book issued successfully');
    }

    public function returnBook($id)
    {
        $issue = BookIssue::find($id);
        $issue->update(['status' => 'returned', 'return_date' => now()]);

        return redirect('/bookissue/index')->with('success', 'Book returned successfully!');
    }
}
