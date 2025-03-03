<!-- 
<!DOCTYPE html>
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Dashboard</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head> 
<body class="bg-light">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-danger text-white" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
 
    {{-- Hero Section --}}
    <div class="container text-center my-5">
        <h1 class="display-4 fw-bold text-primary">Welcome to Your Dashboard</h1>
        <p class="lead text-muted">Manage your posts, settings, and more from here.</p>
        <a href="#" class="btn btn-primary btn-lg">Get Started</a>
    </div>

    {{-- Cards Section --}}
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Posts</h5>
                        <p class="display-6 text-primary fw-bold">120</p>
                        <a href="#" class="btn btn-outline-primary">View Posts</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">New Messages</h5>
                        <p class="display-6 text-success fw-bold">5</p>
                        <a href="#" class="btn btn-outline-success">Check Messages</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Profile Visits</h5>
                        <p class="display-6 text-danger fw-bold">890</p>
                        <a href="#" class="btn btn-outline-danger">View Analytics</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="bg-primary text-white text-center py-3 mt-5">
        <p class="mb-0">© 2025 Dashboard. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html> -->


<!-- 
@extends('layouts.app')

@section('content')
<div class="container text-center my-5">
    <h1 class="display-4 fw-bold text-danger">Welcome to Your Dashboard</h1>
    <p class="lead text-muted">Manage your posts, settings, and more from here.</p>
    <a href="{{ route('posts.index') }}" class="btn btn-danger btn-lg">Manage Posts</a>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Posts</h5>
                    <p class="display-6 text-danger fw-bold">{{ count($posts) }}</p>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-danger">View Posts</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">New Messages</h5>
                    <p class="display-6 text-success fw-bold">5</p>
                    <a href="#" class="btn btn-outline-success">Check Messages</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Profile Visits</h5>
                    <p class="display-6 text-secondary fw-bold">890</p>
                    <a href="#" class="btn btn-outline-secondary">View Analytics</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
