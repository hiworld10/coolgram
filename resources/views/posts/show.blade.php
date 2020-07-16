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
                            @cannot('update', $post->user->profile)
                                &#8226
                                <a href="#" class="pl-1">Follow</a>
                            @endcannot
                        </div>
                    </div>

                    {{-- Dropdown menu for editing or deleting the post --}}
                    @can('update', $post->user->profile)
                        <div class="nav navbar-nav ml-auto">
                            <li class="dropdown nav-item">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="text-dark caret">Options</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="/p/{{ hashid_encode($post->id) }}/edit" class="dropdown-item">
                                            <span class="text-dark">Edit Caption</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <span class="text-dark">Delete Post</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    @endcan
                
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
    