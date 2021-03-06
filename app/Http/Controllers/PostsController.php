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

    public function index()
    {   
        // Get the profile ids user follows
        $user_ids = auth()->user()->following()->pluck('profiles.user_id');

        // Get the posts in descending order
        // latest() = orderBy('created_at', 'DESC')
        // with('user') tells Laravel to also get the user with the post 
        $posts = Post::whereIn('user_id', $user_ids)->with('user')->latest()->simplePaginate(5);

        return view('posts/index', compact('posts'));
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

        $created_post = auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $img_path
        ]);

        return redirect('/p/' . hashid_encode($created_post->id));
    }

    // The post ID is passed from the view. However, the function's argument is a Post object.
    // When this happens and the web route variable coincides with its name, 
    // Laravel searches for a post by that ID and passes it as the argument for the function. 
    // If it is not found, it throws a 404.
    public function show(Post $post) 
    {   
        // compact() automatically associates the string parameter with a variable with
        // the same name inside the function. It is the same as:
        // ['post' => $post]
        // Multiple parameters can also be passed. e.g. compact('post', 'profile')
        return view('posts/show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts/edit', compact('post'));
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post);

        $data = request()->validate([
            'caption' => 'required'
        ]);

        $post->update($data);

        return redirect('/p/' . hashid_encode($post->id));
    }

    public function delete(Post $post)
    {
        $this->authorize('update', $post);

        $post->delete();

        return redirect('/' . auth()->user()->username);
    }
}
