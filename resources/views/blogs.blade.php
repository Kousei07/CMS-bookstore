<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blogs - Blogcraft CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom styles for the blog page */
        body {
            background-color: #f0f4f8;
            font-family: Arial, sans-serif;
        }
        ::-webkit-scrollbar {
            display: none;
        }
          /* header */
        header {
        background-color: #212529;
        padding: 15px 0;
        position: sticky; 
        top: 0; 
        z-index: 1000;
        }
        
        .navbar-brand {
        font-size: 26px;
        font-weight: 700;
        color: #f0a500 !important;
        letter-spacing: 1px;
        }
        
        .navbar-nav .nav-link {
        font-size: 18px;
        padding: 10px 20px;
        color: white !important;
        transition: color 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
        color: #f0a500 !important;
        }
        
        .navbar-toggler {
        border-color: #f0a500;
        }
        
        .navbar-toggler-icon {
        color: #f0a500;
        }

        /* main content */
        main {
        background-color: #f0f4f8; /* Light background for the main area */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        }

        h2 {
        color: #333;
        margin-bottom: 20px;
        }

        .form-label {
        font-weight: bold;
        color: #333;
        }

        .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        transition: border-color 0.3s;
        }

        .form-control:focus {
        border-color: #f0a500;
        box-shadow: 0 0 0 0.2rem rgba(240, 165, 0, 0.25);
        }

        .btn-primary {
        background-color: #f0a500;
        border: none;
        transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
        background-color: #e59400;
        transform: scale(1.05);
        }

        /* footer */
        footer {
        background-color: #212529;
        color: white;
        padding: 40px 0;
        }
        
        .footer-links a {
        color: #f0a500;
        text-decoration: none;
        margin: 0 15px;
        transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
        color: white;
        }
        
        .social-icons a {
        color: #f0a500;
        margin: 0 10px;
        transition: color 0.3s ease;
        }
        
        .social-icons a:hover {
        color: white;
        }
        
        .footer-text {
        margin-top: 20px;
        font-size: 14px;
        }
        .blog-container {
            margin-top: 30px;
        }

        .blog-card {
            border: none;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            background-color: #fff;
            padding: 20px;
        }

        .blog-card:hover {
            transform: translateY(-5px);
        }

        .blog-card h5 {
            color: #f0a500;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .blog-card p {
            color: #333;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .blog-meta {
            font-size: 12px;
            color: #666;
        }

        .read-more {
            background-color: #f0a500;
            border: none;
            padding: 10px 20px;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .read-more:hover {
            background-color: #e59400;
        }

        .card-wrapper {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
            max-width: 600px; 
            margin: 0 auto; 
        }
    </style>
</head>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark container">
    <a class="navbar-brand" href="#"><i class="fas fa-pencil-alt"></i> Blogcraft</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.dashboard') }}">Post a blog</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Blogs
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('blogs') }}">All Blogs</a></li>
            <li>
                <a class="dropdown-item" href="{{ route('user.blogs', auth()->check() ? auth()->user()->id : '') }}">
                    My Blogs
                </a>
            </li>

          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu" aria-labelledby="settingsDropdown">
            <li>
              <form action="{{ route('user.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<body>

<div class="container blog-container">
    <h1 class="mb-4">Posted Blogs</h1>
    
    @if($blogs->count())
        <div class="card-wrapper">
            @foreach($blogs as $blog)
                <div class="blog-card">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ Str::limit($blog->content, 200) }}</p>
                    <a href="{{ route('blogs.show', $blog->id) }}" class="read-more">Read More</a>
                </div>
            @endforeach
        </div>
    @else
        <p>No blogs found.</p>
    @endif
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
