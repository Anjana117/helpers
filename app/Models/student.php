<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable=['name','gender','email','phone','address','class'];

  public function books()
    {
        return $this->belongsToMany(Book::class, 'student_books')->withPivot('issue_date', 'return_date');
    }
}
