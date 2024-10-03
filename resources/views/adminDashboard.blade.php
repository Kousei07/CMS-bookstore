<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body i {
            font-size: 30px;
            color: #f0a500;
            margin-right: 15px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            font-size: 16px;
            color: #666;
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
    </style>
</head>

<body>

<main class="container mt-5">
    <div class="sidebar">
        <h2 class="text-white mb-4">Admin Dashboard</h2>
        <nav class="nav flex-column">
            <a class="nav-link active" href="#"><i class="fas fa-home"></i> Dashboard</a>
            <a class="nav-link" href="{{ route('manage.users') }}"><i class="fas fa-users"></i> Manage Users</a>
            <a class="nav-link" href="{{ route('manage.books') }}"><i class="fas fa-file-alt"></i> Add Books</a>
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
            <h1>Welcome, Admin</h1>
            <p class="mb-0">Manage your content and users efficiently.</p>
        </header>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card p-3">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-users"></i>
                        <div>
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>
            </div>

        


<div class="col-md-4 mb-4">
    <div class="card p-3">
        <div class="card-body d-flex align-items-center">
            <i class="fas fa-shopping-cart"></i> 
            <div>
                <h5 class="card-title">Total Items in Cart</h5>
                <p class="card-text">Total: {{ count($cartItems) }} items</p>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="card p-3">
        <div class="card-body d-flex align-items-center">
            <i class="fas fa-file-alt"></i>
            <div>
                <h5 class="card-title">Total of Books</h5>
                <p class="card-text">{{ $totalBooks }}</p> 
            </div>
        </div>
    </div>
</div>
        </div>

        <!-- for aesthetic purposes only -->
        <section>
            <h2>Recent Activities</h2>
            <ul class="list-group">
                <li class="list-group-item"><strong>Admin</strong> has uploaded a new Book.</li>
                <li class="list-group-item"><strong>Admin</strong> updated the settings.</li>
                <li class="list-group-item"><strong>User 07</strong> has brought a Book.</li>
            </ul>
        </section>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
