@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5 ml-auto">
            {{-- 180 x 180 resolution --}}
            <img src="/img/profile-test.png" class="rounded-circle" alt=""> 
        </div>
        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a class="btn btn-primary" href="/p/create">New Post</a>
            </div>
            <div class="d-flex pt-1 ">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>491k</strong> followers</div>
                <div class="pr-5"><strong>42</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    {{-- TODO: check if post image size can be smaller. --}}
    @if (count($user->posts) <= 0)
        <div class="pt-4 text-center">
            <h3>No posts yet.</h3>
            <p class="pt-3">Add your first one <a href="/p/create">here.</a></p>    
        </div>
    @else
        <div class="row pt-4">
            @foreach ($user->posts as $post)
                <div class="col-4 pb-4">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </div>
            @endforeach
        </div>
    @endif
    
</div>
@endsection
    