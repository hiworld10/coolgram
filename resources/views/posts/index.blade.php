@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($posts) <= 0)
        <div class="pt-4 text-center">
            <div>You are currently not following any accounts.</div>
            <div class="pt-2">Start following accounts to see posts displayed here.</div>
        </div>    
    @else
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-6 offset-3 d-flex align-items-center pb-3">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->imageSrc() }}" class="w-100 rounded-circle" style="max-width: 40px;" alt="profile.jpeg">    
                    </div>

                    <div>
                        <div class="font-weight-bold">
                            <a class="pr-1" href="/{{$post->user->username}}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </div>
                    </div>                
                </div>
            </div>

            <div class="row">
                <div class="col-6 offset-3">
                    <a href="/p/{{ hashid_encode($post->id) }}">
                        <img src="/storage/{{ $post->image }}" class="w-100" alt="image.jpeg">
                    </a>
                </div>
            </div>

            <div class="row pt-3 pb-2">
                <div class="col-6 offset-3">
                    <div>

                        <p>
                            <span class="font-weight-bold">
                                <a href="/{{$post->user->username}}">
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
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    @endif
</div>
@endsection