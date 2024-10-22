<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            background-color: #019A97;
            padding: 20px;
            width: 250px;
            color: white;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 50px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 20px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar ul li a:hover {
            background-color: #017f7c;
        }

        .main-content {
            flex: 1;
            padding: 40px;
            background-color: #fff;
        }

        .main-content h1 {
            color: #019A97;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .card {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .card p {
            color: #666;
        }

        .btn-primary {
            display: flex;
            align-items: center;
            background-color: #019A97;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            max-width: max-content;
        }

        .btn-primary:hover {
            background-color: #017f7c;
        }
    </style>
</head>

<body>
    <x:header/>

    <div class="container">
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="{{ route('dashboard.hotel.index') }}">Manage Hotels</a></li>
                <li><a href="{{ route('dashboard.reservations.index') }}">Manage Reservations</a></li>
                <li><a href="/profile">Profile</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h1>Welcome to the Admin Dashboard</h1>

            <div class="card">
                <h2>Manage Hotels</h2>
                <a href="{{ route('dashboard.hotel.index') }}" class="btn-primary">Go to Hotels</a>
            </div>

            <div class="card">
                <h2>Manage Reservations</h2>
                <a href="{{ route('dashboard.reservations.index') }}" class="btn-primary">Go to Reservations</a>
            </div>
        </div>
    </div>

</body>

</html>
