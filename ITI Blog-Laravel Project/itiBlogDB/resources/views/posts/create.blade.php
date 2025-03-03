@extends('layout.app')

@section('content')

<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm border-0 rounded-3 p-4" style="max-width: 600px; width: 100%;">
        <h3 class="text-primary fw-bold text-center mb-4">
            <i class="bi bi-file-earmark-plus"></i> Create New Post
        </h3>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label fw-semibold">Post Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter post title" value="{{old('title')}}" >
                @error('title')
                <div class="alert alert-danger" role="alert"> 
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-semibold">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4" placeholder="Write post description"  >{{old('description')}}</textarea>
                @error('description')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label fw-semibold">Upload Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*" >
                @error('image')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-danger rounded-pill px-4">
                    <i class="bi bi-x-circle"></i> Cancel
                </a>
                <button type="submit" class="btn btn-outline-primary rounded-pill px-4">
                    <i class="bi bi-check-circle"></i> Submit
                </button>
            </div>
        </form>
    </div>
</div>

@endsection