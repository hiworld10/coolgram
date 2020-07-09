@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>New Post</h1>
                </div>

                <div class="form-group row">
                    @csrf
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>

                    <input id="caption" type="text" 
                    class="form-control @error('caption') is-invalid @enderror" 
                    name="caption" value="{{ old('caption') }}" 
                    autocomplete="caption" autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                    
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

                <div class="row pt-5">
                    <button class="btn btn-primary">Add Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
    