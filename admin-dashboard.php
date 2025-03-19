<?php
session_start();
include("dbconnection.php"); // Ensure database connection

// Check if user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    $_SESSION['status'] = "Unauthorized access!";
    $_SESSION['status_type'] = "error";
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Admin Dashboard Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
        }

        .logout-btn {
            background: red;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background: darkred;
        }

        main {
            padding: 20px;
            text-align: center;
        }

        .welcome {
            margin-bottom: 20px;
        }

        .dashboard-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 250px;
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card a {
            display: inline-block;
            padding: 8px 12px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .card a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <header>
        <h1>Admin Dashboard</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </header>

    <main>
        <section class="welcome">
            <h2>Welcome, Admin</h2>
            <p>Manage users, view orders, and configure settings.</p>
        </section>

        <div class="dashboard-grid">
            <div class="card">
                <h3>Users Management</h3>
                <a href="manage-users.php">View All Users</a>
            </div>

            <div class="card">
                <h3>Orders Management</h3>
                <a href="manage-orders.php">View All Orders</a>
            </div>

            <div class="card">
                <h3>Site Settings</h3>
                <a href="settings.php">Update Settings</a>
            </div>
        </div>
    </main>

</body>
</html>
