<?php

namespace App\Helpers;

use App\Models\User; // Import the model you want to search in

class SearchHelper
{
    /**
     * Search for a user by name in the database.
     *
     * @param string $text
     * @return User|null
     */
    public static function searchUserByName($text)
{
    return User::where('name', 'LIKE', "%$text%")->get();
}

}
