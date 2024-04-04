<?php

namespace App\Http\Filters;

use App\Contracts\Filters\Filterable;
use App\Models\User;

class UserFilter implements Filterable
{

    public static function get()
    {
        $orderings = ['firstname', 'middlename', 'lastname', 'name_extension'];

        switch (request('sort_by')) {

            case 'Username':
                $orderings = ['username'];
                break;

            case 'Role':
                $orderings = ['role'];
                break;

            case 'Status':
                $orderings = ['status'];
                break;
        }
        $direction = request('direction') && request('direction') === 'Descending' ? 'DESC' : 'ASC';

        $users = User::query()

            ->when(request('query'), function ($query) {
                $query->filter(request('query'));
            })

            ->when(request('status') && request('status') !== 'All', function ($query) {

                $query->where('status', strtolower(request('status')));
            })

            ->when(request('role') && request('role') !== 'All', function ($query) {

                $query->where('role', strtolower(request('role')));
            });

        foreach ($orderings as $ordering) {

            $users = $users->orderBy($ordering, $direction);
        }

        $users = $users->paginate(request('size', 10))
            ->withQueryString();

        return $users;
    }
}