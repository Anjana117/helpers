<?php

namespace App\Helpers;

use App\Models\User; 

class SearchHelper
{
    public static function searchUserByName($text)
{
    return User::where('name', 'LIKE', "$text%")->get();
}

}
