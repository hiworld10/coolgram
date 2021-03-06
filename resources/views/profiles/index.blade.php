@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5 ml-auto">
            {{-- 180 x 180 resolution --}}
            <img src="{{ $user->profile->imageSrc() }}" class="rounded-circle w-100" alt="profile.jpeg"> 
        </div>
        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center">
                    <div class="h4" style="font-size: 30px;">{{ $user->username }}</div>
                    @cannot('update', $user->profile)
                        <follow-button username="{{ $user->username }}" follows="{{ $follows }}" ></follow-button>
                    @endcannot
                </div>
                @can('update', $user->profile)
                    <a class="btn btn-primary" href="/p/create">New Post</a>
                @endcan
            </div>
                @can('update', $user->profile)
                    <a href="/{{$user->username}}/edit">Edit Profile</a>
                @endcan
            <div class="d-flex pt-1 ">
                <div class="pr-5"><strong>{{ $posts_count }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followers_count }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $following_count }}</strong> following</div>
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
            @can('update', $user->profile)
                <p class="pt-3">Add your first one <a href="/p/create">here.</a></p>    
            @endcan
        </div>
    @else
        <div class="row pt-4">
            @foreach ($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{ hashid_encode($post->id) }}">
                        <img src="/storage/{{ $post->image }}" class="w-100">
                    </a>
                </div>
            @endforeach
        </div>
    @endif
    
</div>
@endsection
    