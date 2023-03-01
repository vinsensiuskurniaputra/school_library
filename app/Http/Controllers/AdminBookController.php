<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.book.index', [
            'books' => Book::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.book.create', [
            "categories" => Category::latest()->get(),
            "statuses" => Book::STATUSES,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'numeric'],
            'penulis' => ['required'],
            'penerbit' => ['required'],
            'tanggal_terbit' => ['required'],
            'jumlah' => ['required'],
            'status' => ['required', Rule::in(BOOK::STATUSES)],
            'cover' => ['nullable', 'file', 'image', 'max:2048'],
            'sinopsis' => ['required'],
        ]);
        if($request->hasFile('cover')){
            $validatedData['cover'] = $request->file('cover')->store('covers');
        }
        
        Book::create($validatedData);

        return redirect()
            ->route('admin.book.index')
            ->with('success', 'Berhasil menambah buku.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('pages.admin.book.edit', [
            "categories" => Category::latest()->get(),
            "statuses" => Book::STATUSES,
            "book" => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'numeric'],
            'penulis' => ['required'],
            'penerbit' => ['required'],
            'tanggal_terbit' => ['required'],
            'jumlah' => ['required'],
            'status' => ['required', Rule::in(BOOK::STATUSES)],
            'cover' => ['nullable', 'file', 'image', 'max:2048'],
            'sinopsis' => ['required', 'nullable'],
        ]);
        if($request->hasFile('cover')){
            $validatedData['cover'] = $request->file('cover')->store('covers');
        }
        if (isset($book->cover) && $request->hasFile('cover')) {
            Storage::disk('public')->delete($book->cover);
        }
        
        $book->update($validatedData);

        return redirect()
            ->route('admin.book.index')
            ->with('success', 'Berhasil Mengedit buku.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if (isset($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }
        $book->delete();

        return redirect()
            ->route('admin.book.index')
            ->with('success','Anda Berhasil Menghapus '.$book->judul.'!');

    }
}
