<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        /* Sidebar */
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

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            color: #333;
        }

        .form-label {
            font-weight: bold;
            color: #666;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #f0a500;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e08900;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2 class="text-white mb-4">Admin Dashboard</h2>
        <nav class="nav flex-column">
            <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
            <a class="nav-link" href="{{ route('manage.users') }}"><i class="fas fa-users"></i> Manage Users</a>
            <a class="nav-link" href="{{ route('manage.books') }}"><i class="fas fa-file-alt"></i> Manage Books</a>
            <a class="nav-link active" href="{{ route('view.books') }}"><i class="fas fa-file-alt"></i> Editing...</a>
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
            <h1>Edit Book</h1>
            <p class="mb-0">Update the details of the selected book.</p>
        </header>

        <div class="form-container">
            <form action="{{ route('update.book', $book->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="product_name" class="form-label">Book Name:</label>
                    <input type="text" id="product_name" name="product_name" class="form-control" value="{{ $book->product_name }}">
                </div>

                <div class="mb-3">
                    <label for="product_description" class="form-label">Description:</label>
                    <textarea id="product_description" name="product_description" class="form-control">{{ $book->product_description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" value="{{ $book->quantity }}">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{ $book->price }}">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label" style="display: none;">Status:</label>
                    <select id="status" name="status" class="form-control" style="display: none;">
                        <option value="enabled" {{ $book->status == 'enabled' ? 'selected' : '' }}>Enabled</option>
                        <option value="disabled" {{ $book->status == 'disabled' ? 'selected' : '' }}>Disabled</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Book</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
