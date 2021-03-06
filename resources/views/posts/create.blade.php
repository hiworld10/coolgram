@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>New Post</h1>
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
                            <strong style="color: red; font-size: 12px;">{{ $message }}</strong>
                        @enderror                    
                </div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                    
                    <textarea name="caption" id="caption" cols="80" rows="10" autofocus>
                        {{ old('caption') }}
                    </textarea>
                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row pt-5">
                    <button class="btn btn-primary">Add Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
    