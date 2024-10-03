<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #212529;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
        }

        .sidebar .nav-link {
            color: #f0a500;
            margin-bottom: 15px;
            font-size: 18px;
            transition: color 0.3s;
        }

        .sidebar .nav-link:hover {
            color: #fff;
        }

        .sidebar .nav-link.active {
            color: #fff;
            background-color: #f0a500;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .dashboard-header {
            background-color: #f0a500;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

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
    </style>
</head>

<body>

<main class="container mt-5">
    <div class="sidebar">
        <h2 class="text-white mb-4">Admin Dashboard</h2>
        <nav class="nav flex-column">
            <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
            <a class="nav-link" href="{{ route('manage.users') }}"><i class="fas fa-users"></i> Manage Users</a>
            <a class="nav-link active" href="{{ route('manage.books') }}"><i class="fas fa-book"></i> Add Books</a>
            <a class="nav-link" href="{{ route('view.books') }}"><i class="fas fa-file-alt"></i> View Books</a>
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </div>

    <div class="content">
        <header class="dashboard-header">
            <h1>Manage Books</h1>
            <p class="mb-0">Add new books to your inventory.</p>
        </header>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('store.book') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="product_name" class="form-label">Book Name</label>
        <input type="text" name="product_name" id="product_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="product_description" class="form-label">Description</label>
        <textarea name="product_description" id="product_description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" step="0.01" name="price" id="price" class="form-control" required>
    </div>
    <div class="mb-3" style="display: none;">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="enabled">Enabled</option>
            <option value="disabled">Disabled</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add Book</button>
</form>

    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
