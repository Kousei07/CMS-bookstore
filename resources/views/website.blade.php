<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Haven</title>
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

    /* main content */
    .hero {
      background-color: #f0a500;
      color: white;
      padding: 60px 20px;
      text-align: center;
      border-radius: 8px;
    }

    .book-post {
      background-color: #f8f9fa;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s;
    }

    .book-post:hover {
      transform: translateY(-5px);
    }

    .post-title {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }

    .post-meta {
      font-size: 14px;
      color: #777;
    }

    /* sidebar */
    .sidebar {
      background-color: #f8f9fa;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar h3 {
      font-size: 20px;
      color: #333;
    }

    .sidebar p,
    .sidebar ul {
      font-size: 14px;
      color: #555;
    }

    .btn-primary {
      background-color: #f0a500;
      border: none;
      transition: background-color 0.3s;
    }

    .btn-primary:hover {
      background-color: #e59400;
    }

    #about {
      background-color: #fff;
      padding: 400px auto;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); /* Subtle shadow */
    }
    #about h2 {
        font-size: 32px;
        font-weight: bold;
        color: #333;
    }

    #about p {
        font-size: 16px;
        color: #555;
        margin-bottom: 15px;
        line-height: 1.6;
    }

    #about img {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 100%;
        height: auto;
    }

    #about .btn-primary {
        background-color: #f0a500;
        border: none;
        padding: 10px 25px;
        transition: background-color 0.3s ease, transform 0.2s;
    }

    #about .btn-primary:hover {
        background-color: #e59400;
        transform: translateY(-3px); 
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
    
    .img-fluid {
      max-width: 100%;
      height: auto;
    }
    
    #contact {
      background-color: #f8f9fa; 
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); 
    }

    #contact h2 {
        font-size: 32px;
        color: #333;
        font-weight: 700;
    }

    #contact p {
        font-size: 16px;
        color: #555;
        margin-bottom: 30px;
    }

    #contact .form-control {
        border: 2px solid #f0a500; 
        transition: border-color 0.3s ease, box-shadow 0.3s ease; 
    }

    #contact .form-control:focus {
        border-color: #e59400; 
        box-shadow: 0 0 5px rgba(240, 165, 0, 0.3); 
    }

    #contact .btn-primary {
        background-color: #f0a500;
        border: none;
        font-size: 18px;
        padding: 12px 30px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    #contact .btn-primary:hover {
        background-color: #e59400;
        transform: translateY(-3px); 
    }

    #book {
      background-color: #f8f9fa; 
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); 
    }

    #book h2 {
        font-size: 32px;
        color: #333;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .book-post {
        background-color: white;
        border-radius: 8px;
        overflow: hidden; 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s, box-shadow 0.3s;
    }

    .book-post:hover {
        transform: translateY(-5px); 
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); 
    }

    .book-post img {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .book-post .post-title {
        font-size: 22px;
        color: #333;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .book-post .post-meta {
        font-size: 14px;
        color: #888;
        margin-bottom: 10px;
    }

    .book-post p {
        font-size: 16px;
        color: #555;
    }

    .book-post a.btn-primary {
        background-color: #f0a500;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s;
    }

    .book-post a.btn-primary:hover {
        background-color: #e59400;
        transform: translateY(-3px); 
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
          <a class="nav-link active" aria-current="page" href="#home">Home</a>
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

<div class="hero" id="home">
  <h1>Welcome to Book Haven</h1>
  <p>Your one-stop shop for all your book needs.</p>
  <a href="#books" class="btn btn-primary">Explore Books</a>
</div>

<div class="container my-5">
  <div class="row">
    <div class="col-md-8">
      <div class="book-post">
      <img src="{{ asset('images/image1.jpg') }}" class="img-fluid" alt="Book Cover" width="500" height="500">
        <div class="post-title">The Night Circus</div>
        <div class="post-meta">by Erin Morgenstern | $20.00</div>
        <p>The Night Circus became a New York Times bestseller, receiving glowing reviews and earning a place among the best romantic fantasy books.</p>
        <a href="{{ route('user.login') }}" class="btn btn-primary">Add to Cart</a>
      </div>

      <div class="book-post">
      <img src="{{ asset('images/image2.jpg') }}" class="img-fluid" alt="Book Cover" width="500" height="500">
        <div class="post-title">Watership Down</div>
        <div class="post-meta">by Author Name | $25.00</div>
        <p>Watership Down is an adventure novel by English author Richard Adams, published by Rex Collings Ltd of London in 1972. Set in Hampshire in southern England, the story features a small group of rabbits.</p>
        <a href="{{ route('user.login') }}" class="btn btn-primary">Add to Cart</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="sidebar">
        <h3>About Us</h3>
        <p>We are passionate about books and dedicated to providing you with the best reading experience.</p>
        <h4>Follow Us</h4>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="about" class="container my-5">
  <h2>About Book Haven</h2>
  <p>At Book Haven, we believe in the power of stories to change lives. Our mission is to provide a vast selection of books across genres, ensuring every reader finds their next favorite read.</p>
  <img src="{{ asset('images/book2.png') }}" class="img-fluid" alt="About Us" width="700" height="500">
</div>

<div id="contact" class="container my-5">
  <h2>Contact Us</h2>
  <p>If you have any questions or suggestions, feel free to reach out!</p>
  <form>
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" required>
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Message</label>
      <textarea class="form-control" id="message" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send Message</button>
  </form>
</div>

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
