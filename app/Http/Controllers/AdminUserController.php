<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.user.index',[
            'users' => User::latest()->where('role', User::ROLES['Member'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'string', 'alpha_dash', 'unique:' . User::class ],
            'password' => ['required', 'string', 'confirmed', 'max:255'],
            'name' => ['required', 'string'],
            'address' => ['required'],
            'photo_profile' => ['nullable', 'file', 'image', 'max:2048']
        ]);
        $validatedData['role'] = User::ROLES['Member'];
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        if($request->hasFile('photo_profile')){
            $validatedData['photo_profile'] = $request->file('photo_profile')->store('photos_profile');
        }
        User::create($validatedData);
        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Anda berhasil manambahkan User ' . $validatedData['username']);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.admin.user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required'],
            'photo_profile' => ['nullable', 'file', 'image', 'max:2048']
        ]);

        if(isset($request->username)){
            $validatedData['username'] = $request->validate([
                'username' => ['required', 'string', 'alpha_dash', 'unique:' . User::class ],
            ])['username'];
        }

        if(isset($request->password)){
            $newPassword = $request->validate([
                'password' => ['required','string', 'confirmed', 'max:255'],
            ]);
            $validatedData['password'] = Hash::make($newPassword['password']);
        }

        if($request->hasFile('photo_profile')){
            Storage::disk('public')->delete($user->photo_profile);
            $validatedData['photo_profile'] = $request->file('photo_profile')->store('photos_profile');
        }
        $user->update($validatedData);
        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Anda berhasil Mengedit User ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(isset($user->photo_profile)){
            Storage::disk('public')->delete($user->photo_profile);
        }
        $user->delete();
        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Anda Berhasil Menghapus User !');
    }
}
