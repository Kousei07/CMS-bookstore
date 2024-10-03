<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Haven</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
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
      background-color: #f0f4f8; 
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    h2 {
      color: #333;
      margin-bottom: 20px;
    }

    .book-card {
      margin-bottom: 20px;
      padding: 15px;
      border: 1px solid #ced4da;
      border-radius: 5px;
      background-color: #ffffff;
    }

    .btn-buy {
      background-color: #f0a500;
      border: none;
      transition: background-color 0.3s;
    }

    .btn-buy:hover {
      background-color: #e59400;
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
    .user-name {
        font-weight: bold;
        color: #f0a500;
        margin: 0;
        font-size: 1.2rem; 
        text-align: center;
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
          <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu" aria-labelledby="settingsDropdown">
            <li>
                <form action="{{ route('user.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <p class="user-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                    <button type="submit" class="dropdown-item"> Logout</button>
                </form>
            </li>
        </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

<main class="container mt-5">
    <div class="row">
        <h2>Your Books</h2>
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 d-flex justify-content-center mb-4">
                    <div class="book-card text-center" style="width: 100%;">
                        <img src="{{ asset('images/book.jpg') }}" alt="{{ $product->product_name }}" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                        <h5 class="book-title">{{ $product->product_name }}</h5> 
                        <p class="book-description">{{ $product->product_description }}</p>
                        <p class="book-quantity">Available: {{ $product->quantity }}</p>
                        <p class="book-price">Price: ₱{{ number_format($product->price, 2) }}</p>
                        <a href="#" class="btn btn-buy" 
                          onclick="event.preventDefault(); 
                          document.getElementById('add-to-cart-form-{{ $product->id }}').submit();">
                          Add to Cart
                        </a>

                        <form id="add-to-cart-form-{{ $product->id }}" 
                              action="{{ route('add.to.cart') }}" 
                              method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
