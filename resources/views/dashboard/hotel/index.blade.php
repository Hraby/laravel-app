<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management</title>
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

        .table-container {
            margin-top: 20px;
            background-color: #f5f5f5;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #019A97;
            color: white;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .btn-primary {
            background-color: #019A97;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            font-size: 14px;
        }

        .btn-primary:hover {
            background-color: #017f7c;
            cursor: pointer;
        }
    </style>
</head>

<body>
        <x:header/>
        <div class="container">
            <div class="sidebar">
                <h2>Hotel Management</h2>
                <ul>
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="{{ route('dashboard.hotel.index') }}">Manage Hotels</a></li>
                    <li><a href="{{ route('dashboard.reservations.index') }}">Manage Reservations</a></li>
                    <li><a href="/profile">Profile</a></li>
                </ul>
            </div>

            <div class="main-content">
                <h1>Manage Hotels</h1>

                <a href="{{ route('dashboard.hotel.create') }}" class="btn-primary">Add New Hotel</a>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotels as $hotel)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $hotel->name }}</td>
                                <td>{{ $hotel->description }}</td>
                                <td>
                                    <a href="{{ route('hotel.show', $hotel->slug) }}" class="btn-primary">View</a>
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.hotel.edit', $hotel->id) }}" class="btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.hotel.destroy', $hotel->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-primary">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</body>

</html>