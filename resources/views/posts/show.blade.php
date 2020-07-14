@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="image.jpeg">
        </div>
        <div class="col-5">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->imageSrc() }}" class="w-100 rounded-circle" style="max-width: 40px;" alt="profile.jpeg">    
                    </div>

                    <div>
                        <div class="font-weight-bold">
                            <a class="pr-1" href="/{{$post->user->username}}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                            {{-- Black dot symbol --}}
                            &#8226
                            <a href="#" class="pl-1">Follow</a>
                        </div>
                    </div>

                </div>
                <hr>
                <p>
                    <span class="font-weight-bold">
                        <a href="/{{$post->user->username}}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span>
                    {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
    