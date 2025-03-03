@extends('layout.app')

@section('content')

<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded-3 p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-primary fw-bold">📜 Posts History</h3>
            <a href="{{ route('posts.create') }}" class="btn btn-success rounded-circle">
                <i class="bi bi-plus-lg"></i>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($posts as $post)
                        <tr class="text-center">
                            <td class="fw-bold">{{ $post['id'] }}</td>
                            <td class="text-primary fw-semibold">{{ $post['title'] }}</td>
                            <td class="text-muted" style="max-width: 250px; overflow: hidden; text-overflow: ellipsis;">
                                {{ Str::limit($post['description'], 50, '...') }}
                            </td>
                            <td>
                                <img src="{{ asset('imgs/' . $post['image']) }}" class="rounded shadow-sm" width="60">
                            </td>
                            <td>
                                <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-outline-info btn-sm" 
                                   data-bs-toggle="tooltip" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-outline-warning btn-sm" 
                                   data-bs-toggle="tooltip" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" 
                                            class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

<div class="w-full flex justify-center py-2">
{{ $posts->links() }}

</div>

        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
@endsection
