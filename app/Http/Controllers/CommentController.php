<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $comment)
    {
        $validatedData = $request->validate([
            "komentar" => ['required']
        ])['komentar'];

        $commentData = [
            "user_id" => $comment->user_id,
            "buku_id" => $comment->book->id,
            "komentar" => $validatedData,
        ];

        Comment::create($commentData);
        $comment->update([
            "status_comment" => true
        ]);
        return redirect()->back()->with('success', 'Anda berhasil menambahkan Komentar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
