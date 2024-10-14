<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reservations Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Main layout */
        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            background-color: #efefef;
            padding: 20px;
            width: 250px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .main-content {
            flex: 1;
            padding: 40px;
        }

        /* Sidebar */
        .profile {
            text-align: center;
            margin-bottom: 50px;
        }

        .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .profile h2 {
            font-size: 20px;
            margin: 10px 0 5px;
        }

        .profile p {
            font-size: 14px;
            color: #666;
        }

        /* Table styles */
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .search-bar {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Logo */
        .logo {
            display: block;
            margin: 40px auto;
        }

        .pagination {
            text-align: right;
        }

        .pagination span {
            margin: 0 5px;
            cursor: pointer;
        }

        .pagination span:hover {
            text-decoration: underline;
        }

        .icons {
            text-align: right;
            margin-bottom: 20px;
        }

        .icons i {
            margin-left: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="profile">
                <img src="profile-image.jpg" alt="Admin">
                <h2>Gigachad</h2>
                <p>Admin</p>
            </div>
        </div>
        
        <div class="main-content">
            <h1>Reservations</h1>
            <input type="text" class="search-bar" placeholder="Search by guest, reservation...">
            
            <table>
                <thead>
                    <tr>
                        <th>Booking</th>
                        <th>Room</th>
                        <th>Guests</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Amount</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>766</td>
                        <td>61</td>
                        <td>Mike Wazowski</td>
                        <td>19.12.24</td>
                        <td>23.12.24</td>
                        <td>$3,461</td>
                        <td>All inclusive</td>
                    </tr>
                    <!-- Repeat similar rows for the rest of the data -->
                </tbody>
            </table>

            <div class="pagination">
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>....</span>
                <span>6</span>
            </div>

            <div class="icons">
                <i class="info-icon">i</i>
                <i class="notification-icon">🔔</i>
            </div>

            <img src="logo.png" alt="IPSUM logo" class="logo">
        </div>
    </div>
</body>
</html>