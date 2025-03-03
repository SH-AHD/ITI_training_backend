@extends('layout.app')

@section('content')

<div class="container mt-5 d-flex justify-content-center">
  <div class="card shadow-sm border-0 rounded-3 p-4" style="max-width: 600px; width: 100%;">
    <h3 class="text-warning fw-bold text-center mb-4">
      <i class="bi bi-pencil-square"></i> Edit Post
    </h3>

    <form action="{{ route('posts.update', $post['id']) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="title" class="form-label fw-semibold">Post Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title', $post['title']) }}" required>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label fw-semibold">Description</label>
        <textarea class="form-control" name="description" rows="4" required>{{ old('description', $post['description']) }}</textarea>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label fw-semibold">Upload New Image</label>
        <input type="file" class="form-control" name="image" accept="image/*">
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('posts.index') }}" class="btn btn-outline-danger rounded-pill px-4">
          <i class="bi bi-x-circle"></i> Cancel
        </a>
        <button type="submit" class="btn btn-outline-warning rounded-pill px-4">
          <i class="bi bi-save"></i> Update
        </button>
      </div>
    </form>
  </div>
</div>

@endsection