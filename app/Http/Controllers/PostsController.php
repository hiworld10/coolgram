<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        // Requires a logged in user before calling any class methods
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $img_path = $data['image']->store('uploads', 'public');

        // Create an image using the Intervention library passing it the stored image
        // file to the make function. Then save it.
        $image = Image::make(public_path("storage/{$img_path}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $img_path
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }
}
