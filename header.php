<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChickMart - Functional Search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

    <header id="main-header">
        <h1>ChickMart</h1>
        <nav class="navbar" id="header">
            <a href="index.php" onclick="return delayRedirect(event, 'index.php')">Home</a>

            <!--  --Categories Section--  -->
            <div class="dropdown">
                <a href="categories.php" onclick="return delayRedirect(event, 'categories.php')" class="dropdown-toggle">Categories</a>
                <div class="dropdown-menu">
                    <a href="advertisement.php">Breeds</a>
                    <a href="advertisement.php">Eggs</a>
                    <a href="advertisement.php">Machines</a>
                    <a href="advertisement.php">Vacines</a>
                    <a href="advertisement.php">Feeds</a>
                    <a href="advertisement.php">Equipments</a>
                    <a href="advertisement.php">Livestock</a>
                    <a href="advertisement.php">Live Selling</a>
                </div>
            </div>
            <a href="recommendations.php" onclick="return delayRedirect(event, 'recommendations.php')">Recommendations</a>
            <div class="dropdown">
                <a href="login.php" onclick="return delayRedirect(event, 'login.php')" class="dropdown-toggle">Profile</a>
                <div class="dropdown-menu">
                    <a href="dashboard.php">Dashboard</a>
                </div>
            </div>
            </div>
        </nav>
        <button class="login-btn" onclick="window.location.href='login.php'">
            Login
        </button>
    </header>
    <div class="sub-header" id="main-header1">
        <a href="login.php">Register now and make early access to our upcoming app!</a>
    </div>
    <script>
        window.addEventListener("scroll", function() {
            let header = document.getElementById("main-header");

            if (window.scrollY > 50) { // Trigger effect after 50px scroll
                header.classList.add("header-scrolled");
            } else {
                header.classList.remove("header-scrolled");
            }
        });
    </script>
    <script>
        window.addEventListener("scroll", function() {
            let header = document.getElementById("main-header1");

            if (window.scrollY > 50) { // Trigger effect after 50px scroll
                header.classList.add("header-scrolled");
            } else {
                header.classList.remove("header-scrolled");
            }
        });
    </script>
</body>

</html>