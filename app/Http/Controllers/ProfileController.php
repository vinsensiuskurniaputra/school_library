<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        return view('pages.user.profile');
    }
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
            ->route('profile.index')
            ->with('success', 'Anda berhasil Mengedit User ');
    }
}
