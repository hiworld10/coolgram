@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)

        <div class="row">
            <div class="col-6 offset-3 d-flex align-items-center pb-3">
                <div class="pr-3">
                    <img src="{{ $post->user->profile->imageSrc() }}" class="w-100 rounded-circle" style="max-width: 40px;" alt="profile.jpeg">    
                </div>

                <div>
                    <div class="font-weight-bold">
                        <a class="pr-1" href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </div>
                </div>                
            </div>
        </div>

        <div class="row">
            <div class="col-6 offset-3">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100" alt="image.jpeg">
                </a>
            </div>
        </div>

        <div class="row pt-3 pb-2">
            <div class="col-6 offset-3">
                <div>

                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </span>
                        {{ $post->caption }}
                    </p>
                    <hr>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection