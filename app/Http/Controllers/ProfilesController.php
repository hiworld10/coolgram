<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    // See PostsController@show for refactoring details
    public function index(User $user)
    {
        $follows = auth()->user() ? auth()->user()->following->contains($user->id) : false;

        // Use the cache facade to load the count data before making a new query
        // Params: cache name, time, closure action (when cache misses, set it again)
        $posts_count = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            }
        );

        $followers_count = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            }
        );

        $following_count = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            }
        );

        return view(
            'profiles.index',
            compact(
                'user',
                'follows',
                'posts_count',
                'followers_count',
                'following_count'
            )
        );
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
            'url' => '',
            'image' => ''
        ]);

        // TODO: find out if there's a better alternative for handling an empty url field
        if (request('url')) {
            $url = request()->validate([
                'url' => 'url'
            ]);

            $data = array_merge($data, ['url' => $url]);
        }

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
