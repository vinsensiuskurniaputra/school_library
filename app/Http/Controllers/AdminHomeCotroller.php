<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeCotroller extends Controller
{
    function __invoke(){
        return view('pages.admin.home.index', [
            "many_members" => User::where('role', User::ROLES['Member'])->count(),
            "many_admins" => User::where('role', User::ROLES['Admin'])->orWhere('role', User::ROLES['Librarian'])->count(),
            "many_books" => Book::count()
        ]);
    }
}
