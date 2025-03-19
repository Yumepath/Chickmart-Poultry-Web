<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chickmart Category</title>
    <link rel="stylesheet" href="./css/style.css">
    <!--  -Smooth Scroll--  -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e3f2fd);
            text-align: center;
            margin: 0;
            overflow-x: hidden;
            animation: fadeIn 1.2s ease-in-out;
        }

        .container {
            max-width: 900px;
            margin: auto;
            transform: scale(0.9);
            animation: scaleUp 1s ease-in-out forwards;
        }

        h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
            padding: 10px;
            margin-top: 20px;
            animation: slideDown 1s ease-in-out;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .category {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            padding: 15px;
            text-align: center;
            cursor: pointer;
            opacity: 0;
            transform: translateY(30px) scale(0.9);
            animation: fadeInUp 0.8s ease-out forwards;
            transition: all 0.4s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .category::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s ease-in-out;
        }

        .category:hover::before {
            left: 100%;
        }

        .category img {
            width: 90px;
            height: auto;
            margin-bottom: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .category p {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            transition: color 0.3s ease-in-out;
        }

        .category:hover {
            transform: scale(1.1) rotate(3deg);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .category:hover img {
            transform: scale(1.2) rotate(-3deg);
        }

        .category:hover p {
            color: #007bff;
        }

        @media (max-width: 768px) {
            .grid {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
                gap: 10px;
            }

            .category img {
                width: 70px;
            }

            .category p {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .grid {
                grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            }

            .category img {
                width: 60px;
            }

            .category p {
                font-size: 12px;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.9);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes scaleUp {
            from {
                transform: scale(0.9);
            }

            to {
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    
    <!--  --Slide up animation per section--  -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Animation duration
            once: true, // Animation times
        });
    </script>

    <!--  --PHP INCLUDE HEADER--  -->
    <?php include 'header.php'; ?>
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
    <div class="search-bar" data-aos="fade-up">
        <form action="google.com/search" method="GET">
            <input type="text" name="query" placeholder="Search" required id="search-input">
            <button type="submit">Search</button>
        </form>
    </div>
    <button class="btn-toggle" onclick="toggleDarkMode()"></button>
    <script>
        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");

            // Dark mode save
            if (document.body.classList.contains("dark-mode")) {
                localStorage.setItem("theme", "dark");
            } else {
                localStorage.setItem("theme", "light");
            }
        }

        // check darkmode
        window.onload = function() {
            if (localStorage.getItem("theme") === "dark") {
                document.body.classList.add("dark-mode");
            }
        };
    </script>
    <div class="container" data-aos="fade-up">
        <h2>Chickmart Category Section</h2>
        <div class="grid">
            <div class="category" data-url="broiler.html">
                <img src="./Images/birds.png" alt="Broiler">
                <p>Broiler</p>
            </div>
            <div class="category" data-url="deshi.html">
                <img src="./Images/sabong.png" alt="Deshi">
                <p>Deshi</p>
            </div>
            <div class="category" data-url="eggs.html">
                <img src="./Images/eggs.png" alt="Eggs">
                <p>Eggs</p>
            </div>
            <div class="category" data-url="hatching-eggs.html">
                <img src="./Images/birds.png" alt="Hatching Eggs">
                <p>Hatching Eggs</p>
            </div>
            <div class="category" data-url="chicks.html">
                <img src="./Images/chick.png" alt="Chicks">
                <p>Chicks</p>
            </div>
            <div class="category" data-url="machine.html">
                <img src="./Images/birds.png" alt="Machine & Equipments">
                <p>Machine & Equipments</p>
            </div>
            <div class="category" data-url="chicken-meat.html">
                <img src="./Images/birds.png" alt="Chicken Meat">
                <p>Chicken Meat</p>
            </div>
            <div class="category" data-url="poultry-medicine.html">
                <img src="./Images/birds.png" alt="Poultry Medicine">
                <p>Poultry Medicine</p>
            </div>
            <div class="category" data-url="poultry-feed.html">
                <img src="./Images/birds.png" alt="Poultry Feed">
                <p>Poultry Feed</p>
            </div>
            <div class="category" data-url="vaccines.html">
                <img src="./Images/birds.png" alt="Vaccines">
                <p>Vaccines</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const categories = document.querySelectorAll(".category");
            categories.forEach((category, index) => {
                setTimeout(() => {
                    category.style.opacity = "1";
                    category.style.transform = "translateY(0) scale(1)";
                }, index * 100);
            });

            categories.forEach(category => {
                category.addEventListener("click", () => {
                    const url = category.getAttribute("data-url");
                    if (url) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
    <footer>
            <div class="footer-container" data-aos="fade-up">
                <div class="footer-section about">
                    <img src="./Images/chickmartlogo.png" alt="Chickmart Logo" class="footer-logo">
                    <p>
                        Chickmart provides a knowledge-sharing platform offering premium news,
                        analysis, and information resources for the global agriculture industry.
                    </p>
                    <div class="social-icons">
                        <a href="#"><i class="uil uil-twitter"></i></a>
                        <a href="#"><i class="uil uil-facebook"></i></a>
                    </div>
                </div>

                <div class="footer-section links">
                    <h3>Useful Links</h3>
                    <ul>
                        <li><a href="aboutus.php">About us</a></li>
                        <li><a href="#">Contact our team</a></li>
                        <li><a href="#">Advertise with us</a></li>
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="termsandrecomd.php">Terms & Conditions</a></li>
                        <li><a href="#">Cookie & Privacy Policy</a></li>
                        <li><a href="#">Events</a></li>
                    </ul>
                </div>

                <div class="footer-section newsletter">
                    <h3>Get the latest news and more</h3>
                    <form action="#">
                        <input type="email" placeholder="Please enter your email address" required>
                        <button type="submit">SUBSCRIBE</button>
                    </form>
                    <p>Enter your email address to get our latest news and more!</p>
                    <button class="sell-btn" onclick="window.location.href='advertisement.php'">
                        <img src="https://akmweb.youngjoygame.com/web/gms/image/0a868da9764348ad28cd4e440a034631.png" alt="Get The Mobile App">
                    </button>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2000 - 2025 Chickmart. All Rights Reserved | No part of this site may be reproduced without permission.</p>
                <div class="dropdown">
                    <a href="login.php" onclick="return delayRedirect(event, 'login.php')" class="dropdown-toggle">Our Sites ▼</a>
                    <div class="dropdown-menu">
                        <a href="index.php">Chickmart</a>
                    </div>
                </div>
        </footer>
    <!--  -- END of footer--  -->
    <!--  -- END of footer--  -->
    <!--  -- END of footer--  -->
    <!--  -- END of footer--  -->
    <!--  -- END of footer--  -->
    <!--  -- END of footer--  -->
    <!--  -- END of footer--  -->
    <!--  -- END of footer--  -->
</body>

</html>