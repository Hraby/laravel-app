<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background-color: white;
        position: relative;
        z-index: 10;
    }

    header img {
        width: 70px;
        height: 50px;
    }

    nav {
        display: flex;
        gap: 20px;
    }

    nav a {
        text-decoration: none;
        color: #333;
        font-size: 16px;
    }

    .cta-buttons {
        display: flex;
        gap: 10px;
    }

    .cta-buttons a {
        padding: 10px 20px;
        border-radius: 20px;
        border: 1px solid #4CAF87;
        text-decoration: none;
        color: #019A97;
    }

    .cta-buttons a:nth-child(2) {
        background-color: #019A97;
        color: white;
    }

        .profile-card {
            background-color: #019A97;
            border-radius: 15px 15px 0 0;
            padding: 20px;
            color: black;
            text-align: center;
            position: relative;
        }

        .profile-card .profile-info {
            background-color: white;
            border-radius: 15px;
            padding: 10px;
            display: inline-block;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-card p {
            margin: 0;
        }

        .profile-card strong {
            font-weight: bold;
        }

        .profile-card button {
            background-color: #8b4944;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 10px;
        }

        .reservation-list {
            background-color: #f3f3f3;
            padding: 20px;
            border-radius: 0 0 15px 15px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .reservation-list h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .reservation-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .reservation-card img {
            width: 200px;
            height: 150px;
            border-radius: 10px;
        }

        .reservation-details {
            flex-grow: 1;
            margin-left: 20px;
        }

        .reservation-details h3 {
            margin: 0;
            font-size: 20px;
        }

        .reservation-details p {
            margin: 5px 0;
        }

        .reservation-details .info {
            font-weight: bold;
            color: #8b4944;
            cursor: pointer;
        }

        .reservation-price {
            text-align: right;
            font-size: 18px;
            color: #333;
        }

        .reservation-price strong {
            font-size: 20px;
            color: #8b4944;
        }

    </style>
</head>
<body>
    <x-header />

    <main>
        <div class="container">
            <div class="profile-card">
                <div class="profile-info">
                    <p>Signed in as <strong>Honza Jonkler</strong></p>
                    <button>Sign out</button>
                </div>
            </div>

            <div class="reservation-list">
                <h2>List of reservations</h2>

                <div class="reservation-card">
                    <img src="https://via.placeholder.com/200x150" alt="La Palema Hotel">
                    <div class="reservation-details">
                        <h3>La Palema Hotel</h3>
                        <p>2 Person</p>
                        <p>17. - 21. Nov, 2024</p>
                        <p class="reservation-price">All inclusive <strong>1,678 $</strong></p>
                        <p>★ ★ ★ ★ ★ (1634 Visitors)</p>
                        <p><span class="info">Click for more INFO</span></p>
                    </div>
                </div>

                <div class="reservation-card">
                    <img src="https://via.placeholder.com/200x150" alt="Hawaii Whale Hotel">
                    <div class="reservation-details">
                        <h3>Hawaii Whale Hotel</h3>
                        <p>2 Person</p>
                        <p>17. - 21. Nov, 2024</p>
                        <p class="reservation-price">All inclusive <strong>3,798 $</strong></p>
                        <p>★ ★ ★ ★ ★ (3266 Visitors)</p>
                        <p><span class="info">Click for more INFO</span></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>