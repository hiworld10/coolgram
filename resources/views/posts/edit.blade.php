@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p/{{ hashid_encode($post->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Post</h1>
                    <hr>
                </div>

                <div class="row pt-2">
                    <div class="col-6 offset-3">
                            <img src="/storage/{{ $post->image }}" class="w-100" alt="image.jpeg">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                    
                    <textarea name="caption" id="caption" cols="80" rows="10" autofocus>
                        {{ old('caption') ?? $post->caption }}
                    </textarea>
                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row pt-5">
                    <button class="btn btn-primary">Update Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
    