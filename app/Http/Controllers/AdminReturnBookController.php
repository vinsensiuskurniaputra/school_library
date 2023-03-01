<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class AdminReturnBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.return.index',[
            "returns" => Activity::latest()->where('status', true)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $return)
    {
        History::create([
            'user_id' => $return->user_id,
            'book_id' => $return->book_id,
            'status' => true,
            'status_comment' => false,
        ]);
        $return->book->update(['jumlah' => $return->book->jumlah + 1 ]);
        $return->delete();
        return redirect()->route('admin.return.index')->with('success','Berhasil Menerima Pengembalian!');
    }
}
