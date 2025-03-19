<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chickmart Recommendations</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        section {
            width: 100vw;
            /* Full width */
            height: 100vh;
            /* Full height */
            display: flex;
            box-shadow: none;
        }

        footer {
            position: relative !important;
            z-index: 1;
            padding: 50px 10%;
            bottom: 50%;
            margin-top: 10%;
        }

        h2 {
            font-size: 32px;
            color: #ff5722;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            animation: slideInDown 1s ease-in-out;
        }

        /* Filter Buttons */
        .filter-buttons {
            margin-bottom: 20px;
        }

        .filter-btn {
            background: linear-gradient(135deg, #ff9800, #ff5722);
            color: white;
            border: none;
            padding: 12px 20px;
            margin: 5px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.3s ease, background 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .filter-btn:hover {
            transform: scale(1.1);
            background: linear-gradient(135deg, #ff5722, #ff9800);
        }

        /* Recommendations Grid */
        .recommendations {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        /* Recommendation Card */
        .recommendation-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            padding: 15px;
            transition: transform 0.4s ease-in-out, box-shadow 0.4s ease-in-out;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.6s ease-in-out;
        }

        .recommendation-card:hover {
            transform: scale(1.05) rotate(2deg);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .recommendation-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .recommendation-card:hover img {
            transform: scale(1.1);
        }

        .recommendation-card h3 {
            font-size: 22px;
            color: #333;
            margin: 10px 0;
        }

        .category {
            background: #28a745;
            color: white;
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 5px;
            font-weight: bold;
        }

        .rating {
            color: #FFD700;
            font-size: 18px;
            margin-top: 5px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease-in-out;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            text-align: center;
            transform: scale(0.8);
            animation: zoomIn 0.3s forwards;
        }

        .modal img {
            width: 100%;
            border-radius: 10px;
        }

        .close-btn {
            background: red;
            color: white;
            border: none;
            padding: 8px 15px;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .close-btn:hover {
            background: darkred;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            to {
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
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
    <div class="search-bar">
        <form action="search.php" method="GET">
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

    <h2>Chicken Recommendations</h2>

    <!-- Filter Buttons -->
    <div class="filter-buttons">
        <button class="filter-btn" onclick="filterSelection('all')">All</button>
        <button class="filter-btn" onclick="filterSelection('breeds')">Breeds</button>
        <button class="filter-btn" onclick="filterSelection('feeds')">Feeds</button>
        <button class="filter-btn" onclick="filterSelection('equipment')">Equipment</button>
    </div>

    <!-- Recommendations Grid -->
    <section class="category" data-aos="fade-up">
        <div class="recommendations">
            <div class="recommendation-card breeds" onclick="openModal('Manok Panabong', 'Good for tinola after the fight', 'https://plus.unsplash.com/premium_photo-1661846554697-5455ec0812f2?q=80&w=2067&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                <img src="https://plus.unsplash.com/premium_photo-1661846554697-5455ec0812f2?q=80&w=2067&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Silkie">
                <h3>Manok Panabong</h3>
                <div class="category">Breeds</div>
                <div class="rating">⭐⭐⭐⭐⭐</div>
            </div>

            <div class="recommendation-card feeds" onclick="openModal('Sisiw', 'Mostly they sell this on fiesta', 'https://images.unsplash.com/photo-1589923188651-268a9765e432?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                <img src="https://images.unsplash.com/photo-1589923188651-268a9765e432?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Layer Pellets">
                <h3>Sisiw</h3>
                <div class="category">Feeds</div>
                <div class="rating">⭐⭐⭐⭐</div>
            </div>

            <div class="recommendation-card equipment" onclick="openModal('45 Days Chicken', 'Mostly for eating', 'https://images.unsplash.com/photo-1630090374791-c9eb7bab3935?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                <img src="https://images.unsplash.com/photo-1630090374791-c9eb7bab3935?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Chicken Coop">
                <h3>45 Days Chicken</h3>
                <div class="category">Equipment</div>
                <div class="rating">⭐⭐⭐⭐⭐</div>
            </div>
        </div>
        <div class="recommendations">
            <div class="recommendation-card breeds" onclick="openModal('Manok Panabong', 'Good for tinola after the fight', 'https://plus.unsplash.com/premium_photo-1661846554697-5455ec0812f2?q=80&w=2067&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                <img src="https://plus.unsplash.com/premium_photo-1661846554697-5455ec0812f2?q=80&w=2067&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Silkie">
                <h3>Manok Panabong</h3>
                <div class="category">Breeds</div>
                <div class="rating">⭐⭐⭐⭐⭐</div>
            </div>

            <div class="recommendation-card feeds" onclick="openModal('Sisiw', 'Mostly they sell this on fiesta', 'https://images.unsplash.com/photo-1589923188651-268a9765e432?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                <img src="https://images.unsplash.com/photo-1589923188651-268a9765e432?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Layer Pellets">
                <h3>Sisiw</h3>
                <div class="category">Feeds</div>
                <div class="rating">⭐⭐⭐⭐</div>
            </div>

            <div class="recommendation-card equipment" onclick="openModal('45 Days Chicken', 'Mostly for eating', 'https://images.unsplash.com/photo-1630090374791-c9eb7bab3935?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                <img src="https://images.unsplash.com/photo-1630090374791-c9eb7bab3935?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Chicken Coop">
                <h3>45 Days Chicken</h3>
                <div class="category">Equipment</div>
                <div class="rating">⭐⭐⭐⭐⭐</div>
            </div>
        </div>
        <div class="recommendations">
            <div class="recommendation-card breeds" onclick="openModal('Manok Panabong', 'Good for tinola after the fight', 'https://plus.unsplash.com/premium_photo-1661846554697-5455ec0812f2?q=80&w=2067&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                <img src="https://plus.unsplash.com/premium_photo-1661846554697-5455ec0812f2?q=80&w=2067&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Silkie">
                <h3>Manok Panabong</h3>
                <div class="category">Breeds</div>
                <div class="rating">⭐⭐⭐⭐⭐</div>
            </div>

            <div class="recommendation-card feeds" onclick="openModal('Sisiw', 'Mostly they sell this on fiesta', 'https://images.unsplash.com/photo-1589923188651-268a9765e432?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                <img src="https://images.unsplash.com/photo-1589923188651-268a9765e432?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Layer Pellets">
                <h3>Sisiw</h3>
                <div class="category">Feeds</div>
                <div class="rating">⭐⭐⭐⭐</div>
            </div>

            <div class="recommendation-card equipment" onclick="openModal('45 Days Chicken', 'Mostly for eating', 'https://images.unsplash.com/photo-1630090374791-c9eb7bab3935?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                <img src="https://images.unsplash.com/photo-1630090374791-c9eb7bab3935?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Chicken Coop">
                <h3>45 Days Chicken</h3>
                <div class="category">Equipment</div>
                <div class="rating">⭐⭐⭐⭐⭐</div>
            </div>
        </div>
        <div class="recommendations">
            <div class="recommendation-card breeds" onclick="openModal('Manok Panabong', 'Good for tinola after the fight', 'https://plus.unsplash.com/premium_photo-1661846554697-5455ec0812f2?q=80&w=2067&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                <img src="https://plus.unsplash.com/premium_photo-1661846554697-5455ec0812f2?q=80&w=2067&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Silkie">
                <h3>Manok Panabong</h3>
                <div class="category">Breeds</div>
                <div class="rating">⭐⭐⭐⭐⭐</div>
            </div>

            <div class="recommendation-card feeds" onclick="openModal('Sisiw', 'Mostly they sell this on fiesta', 'https://images.unsplash.com/photo-1589923188651-268a9765e432?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                <img src="https://images.unsplash.com/photo-1589923188651-268a9765e432?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Layer Pellets">
                <h3>Sisiw</h3>
                <div class="category">Feeds</div>
                <div class="rating">⭐⭐⭐⭐</div>
            </div>

            <div class="recommendation-card equipment" onclick="openModal('45 Days Chicken', 'Mostly for eating', 'https://images.unsplash.com/photo-1630090374791-c9eb7bab3935?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                <img src="https://images.unsplash.com/photo-1630090374791-c9eb7bab3935?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Chicken Coop">
                <h3>45 Days Chicken</h3>
                <div class="category">Equipment</div>
                <div class="rating">⭐⭐⭐⭐⭐</div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <h3 id="modal-title"></h3>
            <img id="modal-image" src="" alt="">
            <p id="modal-description"></p>
            <button class="close-btn" onclick="closeModal()">Close</button>
        </div>
    </div>
    <footer>
        <div class="footer-container">
            <div class="footer-section about">
                <img src="./Images/chickmartlogo.png" alt="Global Ag Media Logo" class="footer-logo">
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
                <h3>Subscribe to our chickmart</h3>
                <form action="#">
                    <input type="email" placeholder="Please enter your email address" required>
                    <button type="submit">SUBSCRIBE</button>
                </form>
                <p>Sign up for our regular newsletter and access news from across the Global Ag Media network.</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2000 - 2025 Chickmart. All Rights Reserved | No part of this site may be reproduced without permission.</p>
            <div class="dropdown">
                <span>Our Sites ▼</span>
            </div>
        </div>
    </footer>

    <script>
        function filterSelection(category) {
            document.querySelectorAll(".recommendation-card").forEach(card => {
                card.style.display = card.classList.contains(category) || category === 'all' ? "block" : "none";
            });
        }

        function openModal(title, description, imageUrl) {
            document.getElementById("modal-title").textContent = title;
            document.getElementById("modal-description").textContent = description;
            document.getElementById("modal-image").src = imageUrl;
            document.getElementById("modal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("modal").style.display = "none";
        }
    </script>

</body>

</html>