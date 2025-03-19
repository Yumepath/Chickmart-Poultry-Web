<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Customer UI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
            color: #000;
            transition: background 0.3s, color 0.3s;
        }

        .dark-mode {
            background: #1a1a1a;
            color: #fff;
        }

        .container {
            width: 90%;
            margin: auto;
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: background 0.3s;
        }

        .dark-mode .container {
            background: #2a2a2a;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
        }

        .btn-toggle {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 10px auto;
        }

        .dark-mode .btn-toggle {
            background: #ffcc00;
            color: black;
        }

        .profile-section,
        .orders-section,
        .suggestions {
            text-align: center;
            margin-top: 20px;
        }

        .order-status {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .order-item {
            flex: 1;
            text-align: center;
            margin: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .order-item img {
            width: 50px;
            height: 50px;
            margin-bottom: 5px;
        }

        .order-item p {
            margin: 0;
            font-size: 14px;
        }

        .order-item:hover,
        .order-item.active {
            color: #28a745;
        }

        .product-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 10px;
        }

        .product {
            background: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .dark-mode .product {
            background: #333;
        }

        .product:hover {
            transform: scale(1.05);
        }

        .product img {
            width: 100%;
            border-radius: 5px;
        }

        .avatar img {
            position: relative;
            justify-content: center;
            border-radius: 1rem;
            margin-top: 10px;
            width: 150px;
            height: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <button class="btn-toggle" onclick="toggleDarkMode()">Toggle Dark Mode</button>

        <div class="profile-section">
            <button class="btn-seller">Become Seller</button>
            <div class="profile">
                <div class="avatar">
                    <img src="./Images/profilepic.jpg">
                </div>
                <div class="profile-info">
                    <h2>Washingshing</h2>
                    <p>09123456789</p>
                </div>
            </div>
        </div>

        <div class="orders-section">
            <h3>My Orders</h3>
            <div class="order-status">
                <div class="order-item">
                    <img src="pay.png" alt="To Pay">
                    <p>To Pay</p>
                </div>
                <div class="order-item">
                    <img src="ship.png" alt="To Ship">
                    <p>To Ship</p>
                </div>
                <div class="order-item active">
                    <img src="receive.png" alt="To Receive">
                    <p>To Receive</p>
                </div>
                <div class="order-item">
                    <img src="completed.png" alt="Completed">
                    <p>Completed</p>
                </div>
            </div>
        </div>

        <div class="suggestions">
            <h3>You might also like</h3>
            <div class="product-list">
                <div class="product">
                    <img src="broiler.jpg" alt="Broiler">
                    <p>Broiler</p>
                    <p>Quantity</p>
                    <p>Location</p>
                </div>
                <div class="product">
                    <img src="eggs.jpg" alt="Eggs">
                    <p>Eggs</p>
                    <p>Quantity</p>
                    <p>Location</p>
                </div>
                <div class="product">
                    <img src="broiler.jpg" alt="Broiler">
                    <p>Broiler</p>
                    <p>Quantity</p>
                    <p>Location</p>
                </div>
                <div class="product">
                    <img src="eggs.jpg" alt="Eggs">
                    <p>Eggs</p>
                    <p>Quantity</p>
                    <p>Location</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");

            // Save the mode preference to localStorage
            if (document.body.classList.contains("dark-mode")) {
                localStorage.setItem("theme", "dark");
            } else {
                localStorage.setItem("theme", "light");
            }
        }

        // Check localStorage on page load
        window.onload = function() {
            if (localStorage.getItem("theme") === "dark") {
                document.body.classList.add("dark-mode");
            }
        };
    </script>
</body>

</html>