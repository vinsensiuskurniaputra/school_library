<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\History;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class AdminRequestBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.request.index',[
            'requests' => Activity::latest()->where('status', false)->get(),
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
    public function update(Request $request, Activity $permintaan)
    {
        $validatedData = $request->validate([
            'status' => ['required'],
            function (string $attribute, mixed $value, Closure $fail) {
                if ($value === 1) {
                    $fail("The {$attribute} value is true.");
                }
            },
        ]);


        if($permintaan->book->jumlah > 0){
            $permintaan->update($validatedData);
            $permintaan->book->update(['jumlah' => $permintaan->book->jumlah - 1]);
            
            if($permintaan->book->jumlah == 0){
                $permintaan->book->update(['status' => Book::STATUSES['Unavailable']]);
            }
            
            return redirect()->route('admin.permintaan.index')->with('success', 'Permintaan Pinjam Buku Diterima');
        } else{
            return redirect()->route('admin.permintaan.index')->with('Error', 'Permintaan Tidak Dapat Diterima, Buku Habis !');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $permintaan)
    {
        History::create([
            'user_id' => $permintaan->user_id,
            'book_id' => $permintaan->book_id,
            'status' => false,
            'status_comment' => true,
        ]);
        $permintaan->delete();
        return redirect()->route('admin.permintaan.index')->with('success','Berhasil Menolak Permintaan!');
    }
}
