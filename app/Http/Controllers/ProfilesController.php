<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    // See PostsController@show for refactoring details
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));   
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        if (request('image')) {
            $img_path = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$img_path}"))->fit(180, 180);
            $image->save();

            $data = array_merge($data, ['image' => $img_path]);
        }

        auth()->user()->profile->update($data);

        return redirect("/profile/{$user->id}");
    }
}
