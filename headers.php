<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROG Inspired Expanding Search Bar</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        /* Google Font for futuristic look */
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Orbitron', sans-serif;
            background-color: #111;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 40px;
            background: #000;
            box-shadow: 0 4px 10px rgba(255, 0, 0, 0.2);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        /* LOGO */
        .logo {
            display: flex;
            align-items: center;
            color: red;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .logo img {
            height: 30px;
            margin-right: 10px;
        }

        /* NAVIGATION LINKS */
        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 14px;
            transition: 0.3s ease-in-out;
        }

        .nav-links a:hover {
            color: red;
        }

        /* SEARCH BAR */
        .search-container {
            display: flex;
            align-items: center;
            position: relative;
        }

        /* SEARCH ICON */
        .search-icon {
            color: white;
            font-size: 22px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        /* SEARCH BOX */
        .search-box {
            display: flex;
            align-items: center;
            position: absolute;
            right: 0;
            width: 40px;
            /* Initially small */
            height: 40px;
            background: #222;
            border-radius: 20px;
            padding: 8px;
            overflow: hidden;
            transition: width 0.4s ease-in-out, background 0.3s ease-in-out;
        }

        .search-box input {
            width: 0;
            border: none;
            background: transparent;
            color: white;
            font-size: 14px;
            outline: none;
            opacity: 0;
            transition: width 0.4s ease-in-out, opacity 0.3s ease-in-out;
        }

        /* Close Icon */
        .close-icon {
            color: white;
            font-size: 20px;
            cursor: pointer;
            display: none;
        }

        /* ACTIVE STATE - EXPAND */
        .search-container.active .search-box {
            width: 220px;
            background: #333;
        }

        .search-container.active input {
            width: 150px;
            opacity: 1;
        }

        .search-container.active .search-icon {
            display: none;
        }

        .search-container.active .close-icon {
            display: block;
        }
    </style>
</head>

<body>

    <header class="navbar">
        <div class="logo">
            <img src="rog-logo.png" alt="ROG Logo">
            <span>REPUBLIC OF GAMERS</span>
        </div>

        <nav class="nav-links">
            <a href="#">PRODUCTS</a>
            <a href="#">INNOVATION</a>
            <a href="#">DOWNLOADS</a>
            <a href="#">COMMUNITY</a>
            <a href="#">WHAT'S HOT</a>
            <a href="#">SUPPORT</a>
        </nav>

        <!-- Expanding Search Bar -->
        <div class="search-container">
            <i class="ph ph-magnifying-glass search-icon"></i>
            <div class="search-box">
                <input type="text" placeholder="Search..." id="search-input">
                <i class="ph ph-x close-icon"></i>
            </div>
        </div>
    </header>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchContainer = document.querySelector(".search-container");
            const searchIcon = document.querySelector(".search-icon");
            const closeIcon = document.querySelector(".close-icon");
            const searchInput = document.querySelector("#search-input");

            // Open Search Bar
            searchIcon.addEventListener("click", () => {
                searchContainer.classList.add("active");
                searchInput.focus(); // Auto-focus input
            });

            // Close Search Bar
            closeIcon.addEventListener("click", () => {
                searchContainer.classList.remove("active");
                searchInput.value = ""; // Clear input
            });

            // Close on Click Outside
            document.addEventListener("click", (e) => {
                if (!searchContainer.contains(e.target)) {
                    searchContainer.classList.remove("active");
                    searchInput.value = "";
                }
            });
        });
    </script>

</body>

</html>