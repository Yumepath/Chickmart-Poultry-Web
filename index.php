<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ChickMart - The best platform for poultry farmers to buy and sell poultry products efficiently.">
    <meta name="keywords" content="Poultry, Chickens, Eggs, Farming, Hatchery">
    <meta name="author" content="ChickMart Team">
    <link rel="icon" type="image/png" href="./Images/chickmartlogo.png">
    <title>ChickMart</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--  -Smooth Scroll--  -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <!--  --Poppins Font--  -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!--  --CSS--  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <script defer src="./scripts/main.js"></script>
</head>

<body>
    <!--  --PHP INCLUDE HEADER--  -->
    <?php include 'scrollindicator.php'; ?>
    <?php include 'header.php'; ?>
    <!--  --PHP INCLUDE COMMUNITY FLOATER--  -->
    <?php include 'community.php'; ?>

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

    <!--  --Slide up animation per section--  -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Animation duration
            once: true, // Animation times
        });
    </script>
        <!--  --Banner--  -->
        <?php include 'banner.php'; ?>
        <!--  -- END of Banner--  -->
        <!--  -- Category--  -->
        <section class="category" data-aos="fade-up">
            <h2>Category</h2>
            <div class="category-list">
                <div class="category-item" onclick="toggleCategoryDetails(this)">
                    <img src="./Images/birds.png" alt="Breed" loading="lazy">
                    <p>Breed</p>
                    <div class="category-details">
                        <p>Various poultry breeds available</p>
                    </div>
                </div>
                <div class="category-item" onclick="toggleCategoryDetails(this)">
                    <img src="./Images/eggs.png" alt="Eggs" loading="lazy">
                    <p>Eggs</p>
                    <div class="category-details">
                        <p>Fresh eggs available for sale</p>
                    </div>
                </div>
                <div class="category-item" onclick="toggleCategoryDetails(this)">
                    <img src="./Images/chick.png" alt="Chicks" loading="lazy">
                    <p>Chicks</p>
                    <div class="category-details">
                        <p>Day-old and vaccinated chicks</p>
                    </div>
                </div>
                <div class="category-item" onclick="toggleCategoryDetails(this)">
                    <img src="./Images/ducks.png" alt="Ducks" loading="lazy">
                    <p>Ducks</p>
                    <div class="category-details">
                        <p>Different breeds of ducks available</p>
                    </div>
                </div>

            </div>
        </section>
        <!--  -- END of Category--  -->

        <!--  -- Featured Products--  -->
        <section class="featured-products" data-aos="fade-up">
            <h2>Featured Products</h2>
            <div class="product-grid">
                <div class="product-item" onclick="toggleProductDetails(this)">
                    <img src="./Images/chickrecomend.png" alt="Broiler" loading="lazy">
                    <h3>Broiler</h3>
                    <p>Quantity: 500 | Price: ₱100 per unit</p>
                    <div class="product-details">
                        <p>Broiler chickens are raised for meat production and are available in bulk orders.</p>
                    </div>
                </div>
                <div class="product-item" onclick="toggleProductDetails(this)">
                    <img src="./Images/eggrecommend.png" alt="Eggs" loading="lazy">
                    <h3>Eggs</h3>
                    <p>Quantity: 1000 | Price: ₱170 per dozen</p>
                    <div class="product-details">
                        <p>Fresh, organic eggs sourced directly from the farm.</p>
                    </div>
                </div>
                <div class="product-item" onclick="toggleProductDetails(this)">
                    <img src="./Images/feed.png" alt="Poultry Feed" loading="lazy">
                    <h3>Poultry Feed</h3>
                    <p>High-quality feed for your poultry farm</p>
                    <div class="product-details">
                        <p>Nutritious feed to promote healthy growth in poultry.</p>
                    </div>
                </div>
                <div class="product-item" onclick="toggleProductDetails(this)">
                    <img src="./Images/machine.png" alt="Farm Equipment" loading="lazy">
                    <h3>Farm Equipment</h3>
                    <p>Essential tools and accessories</p>
                    <div class="product-details">
                        <p>Durable and reliable farming equipment to enhance productivity.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--  -- END of Featured Products--  -->

        <!--  -- Blog Section--  -->
        <section class="blog" data-aos="fade-up">
            <h2>Latest Articles</h2>
            <div class="blog-posts">
                <div class="blog-item">
                    <img src="./Images/tipsfarm.jpg" alt="Farming Tips" loading="lazy">
                    <h3>10 Essential Tips for Poultry Farming</h3>
                    <p>Learn the best practices to keep your poultry farm successful.</p>
                    <a href="https://nutrien-ekonomics.com/news/ten-tips-for-safety-on-the-farm/">Read More</a>
                </div>
                <div class="blog-item">
                    <img src="./Images/farmmanangement.jpg" alt="Disease Control" loading="lazy">
                    <h3>How to Prevent Common Poultry Diseases</h3>
                    <p>Ensure the health and productivity of your birds.</p>
                    <a href="https://farms.extension.wisc.edu/articles/top-10-farm-safety-tips/">Read More</a>
                </div>
            </div>
        </section>
        <section class="farm-management" data-aos="fade-up">
            <h2>Farm Management</h2>
            <p>Efficient farm management practices help in improving productivity and profits.</p>
            <img src="./Images/farmmanangement.jpg" alt="Farm Management" loading="lazy">
        </section>

        <section class="equipment" data-aos="fade-up">
            <h2>Poultry Equipment</h2>
            <p>Discover various poultry farming tools and equipment for better efficiency.</p>
            <img src="./Images/banner.png" alt="Poultry Equipment" loading="lazy">
        </section>

        <section class="breeding" data-aos="fade-up">
            <h2>Breeding Techniques</h2>
            <p>Best practices for breeding healthy and high-yielding poultry.</p>
            <img src="./Images/banner.png" alt="Breeding Techniques" loading="lazy">
        </section>
        <section class="market-trends" data-aos="fade-up">
            <h2>Market Trends</h2>
            <p>Stay updated with the latest trends in poultry farming and sales.</p>
            <img src="./Images/banner.png" alt="Market Trends" loading="lazy">

            <!-- Chart Container -->
            <div class="chart-container" onclick="zoomChart()">
                <canvas id="marketTrendsChart"></canvas>
            </div>

            <!-- Zoom Overlay -->
            <div id="zoomOverlay" class="zoom-overlay">
                <div class="zoom-content">
                    <canvas id="zoomedChart"></canvas>
                    <button class="close-btn" onclick="closeZoom()">✖</button>
                </div>
            </div>
        </section>

        <!-- Include Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <style>
            /* Normal Chart */
            .chart-container {
                width: 100%;
                max-width: 400px;
                height: 250px;
                margin: auto;
                padding: 10px;
                cursor: pointer;
                transition: transform 0.3s;
            }

            /* Zoom Overlay */
            .zoom-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.8);
                justify-content: center;
                align-items: center;
                z-index: 1000;
                opacity: 0;
                transition: opacity 0.3s ease-in-out;
            }

            .zoom-overlay.active {
                display: flex;
                opacity: 1;
            }

            /* Zoom-in Effect */
            .zoom-content {
                position: relative;
                width: 90%;
                max-width: 700px;
                background: white;
                padding: 20px;
                border-radius: 10px;
                transform: scale(0.7);
                transition: transform 0.3s ease-in-out;
                opacity: 0;
            }

            .zoom-overlay.active .zoom-content {
                transform: scale(1);
                opacity: 1;
            }

            /* Ensure Chart Fills Container */
            .zoom-content canvas {
                width: 100% !important;
                height: auto !important;
                max-height: 400px;
            }

            /* Close Button */
            .close-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                background: red;
                color: white;
                border: none;
                padding: 5px 10px;
                cursor: pointer;
                font-size: 18px;
                border-radius: 5px;
            }

            /* Mobile Optimization */
            @media (max-width: 600px) {
                .zoom-content {
                    max-width: 90%;
                }
            }
        </style>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const ctx = document.getElementById('marketTrendsChart').getContext('2d');
                const zoomCtx = document.getElementById('zoomedChart').getContext('2d');
                const zoomOverlay = document.getElementById("zoomOverlay");

                const chartData = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Egg Prices ($ per dozen)',
                        data: [2.5, 2.8, 3.0, 3.2, 3.1, 3.5, 3.8],
                        borderColor: '#ff9900',
                        backgroundColor: 'rgba(255, 153, 0, 0.2)',
                        tension: 0.3,
                        fill: true
                    }, {
                        label: 'Chicken Demand (in tons)',
                        data: [50, 55, 52, 58, 60, 65, 70],
                        borderColor: '#008080',
                        backgroundColor: 'rgba(0, 128, 128, 0.2)',
                        tension: 0.3,
                        fill: true
                    }]
                };

                const chartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                };

                new Chart(ctx, {
                    type: 'line',
                    data: chartData,
                    options: chartOptions
                });

                let zoomChartInstance;

                function zoomChart() {
                    zoomOverlay.style.display = "flex";
                    setTimeout(() => zoomOverlay.classList.add("active"), 10); // Trigger fade-in animation

                    // Destroy previous chart instance if it exists
                    if (zoomChartInstance) zoomChartInstance.destroy();

                    // Force Redraw After Opening
                    setTimeout(() => {
                        zoomChartInstance = new Chart(zoomCtx, {
                            type: 'line',
                            data: chartData,
                            options: chartOptions
                        });
                    }, 300);
                }

                function closeZoom() {
                    zoomOverlay.classList.remove("active"); // Trigger fade-out
                    setTimeout(() => (zoomOverlay.style.display = "none"), 300); // Delay hide after animation
                }

                window.zoomChart = zoomChart;
                window.closeZoom = closeZoom;
            });
        </script>
        <!--  -- END of Blog--  -->

        <!--  -- Customer Stories--  -->
        <section class="customer-stories" data-aos="fade-up">
            <h2>Customer Stories</h2>
            <p>Read inspiring stories from successful poultry farmers using ChickMart.</p>
            <img src="./Images/banner.png" alt="Customer Stories" loading="lazy">
        </section>
        <!--  -- END of Customer Stories--  -->

        <!--  -- Faq Styling--  -->
        <style>
            .faqs {
                padding: 50px 5%;
                background: #fff;
            }

            .faqs h2 {
                font-size: 2rem;
                margin-bottom: 20px;
                color: #333;
            }

            .faqs__container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                /* Responsive grid */
                gap: 20px;
                max-width: 1200px;
                margin: auto;
            }

            .faq {
                background: #fff;
                padding: 15px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                cursor: pointer;
                transition: 0.3s;
                display: flex;
                align-items: center;
                gap: 15px;
                border-left: 4px solid #007bff;
                overflow: hidden;
            }

            .faq__icon {
                font-size: 20px;
                color: #007bff;
            }

            .question__answer {
                flex: 1;
                text-align: left;
            }

            .question__answer h4 {
                font-size: 1.2rem;
                margin: 0;
                color: #222;
            }

            /* Ensure text is properly hidden at first */
            .question__answer p {
                font-size: 1rem;
                color: #555;
                max-height: 0;
                overflow: hidden;
                opacity: 0;
                transition: max-height 0.5s ease-out, opacity 0.3s ease-out, padding 0.3s ease-out;
                padding-top: 0;
            }

            .faq.expanded .question__answer p {
                opacity: 1;
                padding-top: 3px;
            }
        </style>

        <!-- FAQ Section -->
        <section class="faqs" data-aos="fade-up">
            <h2>Frequently Asked Questions</h2>
            <div class="container faqs__container">
                <article class="faq">
                    <div class="faq__icon"><i class="uil uil-plus"></i></div>
                    <div class="question__answer">
                        <h4>What are the basic requirements to start a poultry farm?</h4>
                        <p>To start a poultry farm, you need land, a well-ventilated poultry house, quality chicks, proper feed, clean water, and good
                            biosecurity measures. You should also have a vaccination schedule and a business plan.</p>
                    </div>
                </article>

                <article class="faq">
                    <div class="faq__icon"><i class="uil uil-plus"></i></div>
                    <div class="question__answer">
                        <h4>How can I prevent diseases in my poultry farm??</h4>
                        <p>Prevent diseases by maintaining hygiene, vaccinating regularly, providing clean water and balanced nutrition, and controlling pests.
                            Also, limit farm visitors to prevent contamination.</p>
                    </div>
                </article>

                <article class="faq">
                    <div class="faq__icon"><i class="uil uil-plus"></i></div>
                    <div class="question__answer">
                        <h4>What is the best feed for my poultry?</h4>
                        <p>The best feed depends on the type and age of your birds. Starter feed is good for chicks, grower feed for pullets, and layer feed for egg-laying hens.
                            Ensure the feed is high in protein, vitamins, and minerals.</p>
                    </div>
                </article>

                <article class="faq">
                    <div class="faq__icon"><i class="uil uil-plus"></i></div>
                    <div class="question__answer">
                        <h4>How long does it take for chickens to start laying eggs?</h4>
                        <p>Most layer hens start laying eggs at around 18–20 weeks of age, provided they have proper nutrition, lighting, and health care.</p>
                    </div>
                </article>

                <article class="faq">
                    <div class="faq__icon"><i class="uil uil-plus"></i></div>
                    <div class="question__answer">
                        <h4>How can I increase egg production in my poultry farm?</h4>
                        <p>To increase egg production, provide a balanced diet, ensure 14–16 hours of light daily, maintain a clean environment, and keep stress levels low.
                            Also, ensure proper disease management.</p>
                    </div>
                </article>
            </div>
        </section>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                document.querySelectorAll(".faq").forEach(faq => {
                    faq.addEventListener("click", () => {
                        const answer = faq.querySelector(".question__answer p");
                        const icon = faq.querySelector(".faq__icon i");
                        const isExpanded = faq.classList.contains("expanded");

                        // Close all other FAQs
                        document.querySelectorAll(".faq").forEach(otherFaq => {
                            if (otherFaq !== faq) {
                                otherFaq.classList.remove("expanded");
                                otherFaq.querySelector(".question__answer p").style.maxHeight = "0px";
                                otherFaq.querySelector(".faq__icon i").classList.replace("uil-minus", "uil-plus");
                            }
                        });

                        // Toggle clicked FAQ
                        if (isExpanded) {
                            faq.classList.remove("expanded");
                            answer.style.maxHeight = "0px";
                            icon.classList.replace("uil-minus", "uil-plus");
                        } else {
                            faq.classList.add("expanded");
                            answer.style.maxHeight = answer.scrollHeight + "px"; // Dynamically adjust height
                            icon.classList.replace("uil-plus", "uil-minus");
                        }
                    });
                });
            });
        </script>
        <!--  -- Testimonals Section--  -->
        <section class="testimonials" data-aos="fade-up">
            <h2>What Our Customers Say</h2>
            <div class="testimonial-container">
                <div class="testimonial-item">
                    <img src="./Images/profilepic.jpg" alt="profilepic.jpg">
                    <p class="quote">"My cock increased his size significantly! Highly recommended!"</p>
                    <h4>- Leonel M.</h4>
                </div>
                <div class="testimonial-item">
                    <img src="./Images/profilepic.jpg" alt="profilepic.jpg">
                    <p class="quote">"ChickMart offers the best cock products. Amazing quality!"</p>
                    <h4>- Arkin P.</h4>
                </div>
                <div class="testimonial-item">
                    <img src="./Images/profilepic.jpg" alt="profilepic.jpg">
                    <p class="quote">"I love how my cock is now. So easy to use!"</p>
                    <h4>- Christian B.</h4>
                </div>
            </div>
        </section>

        <!--  -- END of testimonals--  -->

        <!--  -- Footer Sections--  -->
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