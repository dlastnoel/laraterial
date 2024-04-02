<?php

namespace App\Http\Filters;

use App\Contracts\Filters\Filterable;
use App\Models\User;

class UserFilter implements Filterable
{

    public static function get()
    {
        $users = User::paginate(10);

        return $users;
    }
}