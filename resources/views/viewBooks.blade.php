<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
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

        .table th,
        .table td {
            vertical-align: middle;
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
            <a class="nav-link" href="{{ route('manage.books') }}"><i class="fas fa-file-alt"></i> Add Books</a>
            <a class="nav-link active" href="{{ route('view.books') }}"><i class="fas fa-file-alt"></i> View Books</a>
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
            <h1>View Books</h1>
            <p class="mb-0">Manage and view all the books in your collection.</p>
        </header>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th> <!-- New column for quantity -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->product_name }}</td>
                        <td>{{ $book->product_description }}</td>
                        <td>{{ number_format($book->price, 2) }}</td>
                        <td>{{ $book->quantity }}</td> <!-- Displaying the quantity -->
                        <td>
                            <a href="{{ route('edit.books', $book->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('delete.book', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?');">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($books->isEmpty())
            <div class="alert alert-info">No books available in the collection.</div>
        @endif
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
