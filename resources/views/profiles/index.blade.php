@extends('layouts.app')

@section('content')
<div class="container">
    {{-- TODO: align to center profile picture and information. --}}
    <div class="row">
        <div class="col-3 p-5 ml-auto">
            {{-- 180 x 180 resolution --}}
            <img src="/img/profile-test.png" class="rounded-circle" alt=""> 
        </div>
        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a class="btn btn-primary" href="#">New Post</a>
            </div>
            <div class="d-flex pt-1 ">
                <div class="pr-5"><strong>110</strong> posts</div>
                <div class="pr-5"><strong>491k</strong> followers</div>
                <div class="pr-5"><strong>42</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    {{-- TODO: check if post image size can be smaller. --}}
    <div class="row pt-4">
        <div class="col-4">
            {{-- 640 x 640 resolution --}}
            <img src="/img/img-1.jpg" class="w-100">
        </div>
        <div class="col-4">
            <img src="/img/img-2.jpg" class="w-100">
        </div>
        <div class="col-4">
            <img src="/img/img-3.jpg" class="w-100">
        </div>
    </div>
</div>
@endsection
    