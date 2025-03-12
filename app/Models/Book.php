<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   protected $fillable=['name','author'];

public function users()
{
    return $this->belongsToMany(User::class,'book_user');
}
public function categories()
{
    return $this->belongsToMany(Category::class,'book_category');
}
public function students()
{
    return $this->belongsToMany(Student::class, 'student_books')->withPivot('issue_date', 'return_date');
}
}
