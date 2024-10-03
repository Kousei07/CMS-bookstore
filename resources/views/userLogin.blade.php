<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blogcraft CMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
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
    

    body {
      background-color: #f8f9fa;
    }
    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 30px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .login-title {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .form-label {
      font-weight: bold;
      color: #333;
    }

    .btn-primary {
      background-color: #f0a500;
      border: none;
      transition: background-color 0.3s;
    }

    .btn-primary:hover {
      background-color: #e59400;
    }

  </style>
</head>
<body>

<header>
<nav class="navbar navbar-expand-lg navbar-dark container">
    <a class="navbar-brand" href="#"><i class="fas fa-book"></i> Book Haven</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="{{ route('user.login') }}">User Login</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('admin.login') }}">Admin Login</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

<main class="container mt-5">
<div class="login-container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
  <h2 class="login-title"><i class="fas fa-user-lock"></i> Login as User</h2>
  <form action="{{ route('user.login.submit') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
</form>

  <div class="mt-3 text-center">
    <a href="#" class="text-decoration-none">Forgot your password?</a>
  </div>
  <div class="mt-3 text-center">
    <p>Don't have an account? <a href="{{route('user.signup')}}" class="text-decoration-none">Sign up</a></p>
  </div>
</div>
</main>

<footer>
  <div class="container text-center">
    <div class="footer-links">
      <a href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#contact">Contact</a>
    </div>
    <div class="social-icons mt-3">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
    <div class="footer-text mt-3">
      &copy; 2024 Book Haven. All rights reserved.
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
