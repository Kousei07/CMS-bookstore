<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
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

        /* Dashboard Header */
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
            text-align: center;
        }
    </style>
</head>
<body>

<main class="container mt-5">
    <div class="sidebar">
        <h2 class="text-white mb-4">Admin Dashboard</h2>
        <nav class="nav flex-column">
            <a class="nav-link " href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
            <a class="nav-link active" href="{{ route('manage.users') }}"><i class="fas fa-users"></i> Manage Users</a>
            <a class="nav-link " href="{{ route('manage.books') }}"><i class="fas fa-file-alt"></i> Add Books</a>
            <a class="nav-link" href="{{ route('view.books') }}"><i class="fas fa-file-alt"></i> View Books</a>
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </div>

    <div class="content">
        <header class="dashboard-header">
            <h1>Manage Users</h1>
            <p class="mb-0">Manage your users efficiently.</p>
        </header>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name . ' ' . $user->last_name }}</td> 
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->status)
                                <form action="{{ route('user.disable', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">Disable</button>
                                </form>
                            @else
                                <form action="{{ route('user.enable', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Enable</button>
                                </form>
                            @endif
                            <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this user? Yes or No");
    }
</script>
</body>
</html>
