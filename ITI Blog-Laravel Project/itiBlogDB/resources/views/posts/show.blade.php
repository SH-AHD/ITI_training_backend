@extends('layout.app')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm border-0 rounded-3" style="max-width: 750px; width: 100%;">
        <img src="{{ asset('imgs/' . $posts['image']) }}" 
             class="card-img-top img-fluid rounded-top" 
             alt="Post Image" style="max-height: 350px; object-fit: cover;">
        
        <div class="card-body p-4">
            <h1 class="card-title fw-bold text-dark">{{ $posts['title'] }}</h1>
            <p class="card-text text-secondary fs-5">{{ $posts['description'] }}</p>

          

            <div class="mt-4">
            <a href="{{ route('posts.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                    <i class="bi bi-arrow-left"></i> Back to Posts
                </a>
                <a href="{{ route('posts.edit', $posts['id']) }}" class="btn btn-outline-warning btn-sm" 
                                   data-bs-toggle="tooltip" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('posts.destroy', $posts['id']) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" 
                                            class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>     
            </div>
        </div>
    </div>
</div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleButton = document.getElementById("toggleButton");
            const fullText = document.getElementById("fullText");
            const shortText = document.getElementById("shortText");

            fullText.addEventListener("shown.bs.collapse", function () {
                toggleButton.innerHTML = '<i class="bi bi-chevron-up"></i> See Less';
                shortText.style.display = "none"; // Hide short text when expanded
            });

            fullText.addEventListener("hidden.bs.collapse", function () {
                toggleButton.innerHTML = '<i class="bi bi-chevron-down"></i> See More';
                shortText.style.display = "block"; // Show short text when collapsed
            });
        });
    </script>
@endsection
