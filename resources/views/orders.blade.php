<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        
        .cart-container {
            margin-top: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 15px;
        }

        .cart-item img {
            width: 100px;
            height: auto;
            object-fit: cover;
            margin-right: 20px;
        }

        .cart-item-details {
            flex-grow: 1;
            margin-right: 20px;
        }

        .cart-item-price {
            text-align: right;
            min-width: 100px;
        }

        .summary-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #f0a500;
        }

        .total-label {
            font-size: 18px;
            font-weight: 600;
        }

        .total-amount {
            font-size: 24px;
            font-weight: 700;
            color: #f0a500;
        }

        .checkout-button {
            background-color: #f0a500;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .checkout-button:hover {
            background-color: #e59400;
        }

    </style>
</head>
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

<main class="container">
    <div class="cart-container">
        <h2>Your Orders</h2>
        @if($orders->isEmpty())
            <p>You have no orders yet.</p>
        @else
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

            @php
                $totalAmount = 0; // Initialize total amount
            @endphp
            @foreach($orders as $order)
                <div class="cart-item">
                    <img src="{{ asset('images/book.jpg') }}" alt="{{ $order->product->product_name }}">
                    <div class="cart-item-details">
                        <h5>{{ $order->product->product_name }}</h5>
                        <p>Quantity: {{ $order->quantity }}</p>
                    </div>
                    <div class="cart-item-price">
                        ₱{{ number_format($order->price, 2) }}
                    </div>
                    @php
                        $totalAmount += $order->price; // Calculate total amount
                    @endphp

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelOrderModal{{ $order->id }}">
    Cancel Order
</button>

<div class="modal fade" id="cancelOrderModal{{ $order->id }}" tabindex="-1" aria-labelledby="cancelOrderModalLabel{{ $order->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelOrderModalLabel{{ $order->id }}">Cancel Order for {{ $order->product->product_name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Are you sure you want to cancel this order?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Cancel Order</button>
                </div>
            </form>
        </div>
    </div>
</div>
                </div>
            @endforeach

            <div class="summary-section">
                <div class="total-label">Total Amount:</div>
                <div class="total-amount">₱{{ number_format($totalAmount, 2) }}</div>
                <button class="checkout-button">Proceed to Checkout</button>
            </div>
        @endif
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
