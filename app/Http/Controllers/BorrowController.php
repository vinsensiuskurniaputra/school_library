<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BorrowController extends Controller
{
    public function index(){
        return view('pages.user.activity', [
            'activities' => Activity::latest()->where('user_id', auth()->id())->get(),
        ]);
    }
    
    public function store(Request $request){
        $request->validate([
            'user_id' => ['required'],
            'book_id' => ['required']
        ]);

        Activity::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'status' => false
        ]);

        return redirect()->route('borrow.index')->with('success', 'Anda Berhasil Memajukan Peminjaman, Silahkan Menunggu Konfirmasi Admin !');
    }
}
