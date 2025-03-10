<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   protected $fillable=['name','author'];

public function users()
{
    return $this->belongsToMany(User::class);
}
public function categories()
{
    return $this->belongsToMany(Category::class);
}

}
