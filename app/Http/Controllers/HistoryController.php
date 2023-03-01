<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        return view('pages.user.history', [
            'histories' => History::latest()->where('user_id', auth()->id())->get(),
        ]);
    }
}
