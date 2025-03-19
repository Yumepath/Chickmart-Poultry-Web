<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Manage your poultry farm with our AI-powered poultry marketplace and guide app. Buy and sell poultry, access expert farming guides, and more.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poultry App Advertisement</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9 !important;
            text-align: center;
            color: white;
            overflow-x: hidden;
        }

        .container {
            width: 90%;
            height: auto;
            max-width: 1100px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            color: #333;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        header h1 {
            color: #e67e22;
            font-size: 2em;
            font-weight: bold;
            animation: slideIn 1s ease-in-out;
            opacity: 0;
            animation: slideIn 1s ease-in-out forwards 0.5s;
        }

        header p {
            font-size: 1.1em;
            opacity: 0;
            animation: fadeIn 1s ease-in-out forwards 0.7s;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .content {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .app-image {
            width: 45%;
            max-width: 400px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            animation: zoomIn 1s ease-in-out forwards 0.7s;
            transition: transform 0.4s ease-in-out;
        }

        .app-image:hover {
            transform: scale(1.08);
        }

        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            max-width: 90%;
            width: 400px;
            text-align: center;
            animation: popUp 0.5s ease-in-out;
        }

        @keyframes popUp {
            from {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.8);
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

        .modal button {
            margin-top: 10px;
            padding: 10px 20px;
            background: #e74c3c;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            transition: all 0.3s ease-in-out;
            font-size: 16px;
            cursor: pointer;
        }

        .modal button:hover {
            background: #c70039;
            transform: scale(1.1);
        }

        .details {
            text-align: left;
            flex: 1;
            padding: 20px;
            opacity: 0;
            animation: fadeIn 1s ease-in-out forwards 1s;
        }

        .details ul {
            list-style: none;
            padding: 0;
        }

        .details li {
            font-size: 18px;
            margin: 15px 0;
            color: #34495e;
            font-weight: bold;
            transition: transform 0.3s ease-in-out;
        }

        .details li:hover {
            transform: translateX(10px);
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .button {
            display: inline-block;
            padding: 15px 25px;
            background: linear-gradient(to right, #e74c3c, #c0392b);
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            border-radius: 30px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .button:hover {
            background: linear-gradient(to right, #ff5733, #c70039);
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .button::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s;
        }

        .button:hover::before {
            left: 100%;
        }

        .button:active {
            background: linear-gradient(to right, #c70039, #900c3f);
            transform: scale(0.95);
        }

        .downloading {
            background: #27ae60 !important;
            color: white !important;
            pointer-events: none;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .custom-alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #2ecc71;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            width: 80%;
            max-width: 300px;
            display: none;
            animation: popUp 0.5s ease-in-out;
        }

        @keyframes popUp {
            from {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.8);
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

        .custom-alert button {
            margin-top: 10px;
            padding: 10px 20px;
            background: linear-gradient(to right, #e74c3c, #c0392b);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            transition: all 0.3s ease-in-out;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .custom-alert button:hover {
            background: linear-gradient(to right, #ff5733, #c70039);
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        /* FAQ Section */
        .faqs {
            padding: 50px 5%;
            background: #fff;
        }

        /* FAQ Heading */
        .faqs h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        /* FAQ Grid Container */
        .faqs__container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            /* Adjusts dynamically */
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }

        /* FAQ Card */
        .faq {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: 0.3s ease-in-out;
            display: flex;
            align-items: center;
            gap: 15px;
            border-left: 4px solid #007bff;
            overflow: hidden;
            position: relative;
        }

        /* Hover & Active Effects */
        .faq:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* FAQ Icon */
        .faq__icon {
            font-size: 20px;
            color: #007bff;
            transition: transform 0.3s ease-in-out;
        }

        /* Rotating Icon on Expand */
        .faq.expanded .faq__icon i {
            transform: rotate(180deg);
            color: #28a745;
        }

        /* Question & Answer Styling */
        .question__answer {
            flex: 1;
            text-align: left;
        }

        .question__answer h4 {
            font-size: 1.2rem;
            margin: 0;
            color: #222;
        }

        /* Hidden Answer (Collapsed by Default) */
        .question__answer p {
            font-size: 1rem;
            color: #555;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: max-height 0.5s ease-out, opacity 0.3s ease-out, padding 0.3s ease-out;
            padding-top: 0;
        }

        /* Expanded FAQ */
        .faq.expanded .question__answer p {
            max-height: 500px;
            opacity: 1;
            padding-top: 5px;
        }

        /* General Styling */
        .testimonials {
            text-align: center;
            background: #f9f9f9;
            padding: 60px 20px;
            overflow: hidden;
        }

        .testimonials h2 {
            font-size: 2.5rem;
            color: #ff6600;
            margin-bottom: 30px;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInDown 0.8s ease-out forwards;
        }

        /* Testimonials Container */
        .testimonial-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 25px;
        }

        /* Testimonial Cards */
        .testimonial {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 350px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            transform: translateY(30px);
            opacity: 0;
            animation: fadeInUp 1s ease-in-out forwards;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        /* Profile Image */
        .testimonial img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #ff6600;
            transition: transform 0.3s ease-in-out;
        }

        /* Text Styling */
        .testimonial p {
            font-size: 1.1rem;
            color: #333;
            font-style: italic;
            margin-bottom: 10px;
        }

        .testimonial h4 {
            font-size: 1rem;
            color: #555;
            font-weight: bold;
        }

        /* Hover Effects */
        .testimonial:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(255, 102, 0, 0.3);
        }

        .testimonial:hover img {
            transform: scale(1.1);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .testimonial-container {
                flex-direction: column;
                align-items: center;
            }
        }




        /* RESPONSIVE DESIGN */

        /* For Tablets */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .faqs h2 {
                font-size: 1.8rem;
            }

            .faqs__container {
                grid-template-columns: 1fr;
                /* Single column layout for better readability */
                gap: 15px;
            }

            .faq {
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
            }

            .faq__icon {
                font-size: 24px;
                position: absolute;
                right: 15px;
                top: 15px;
            }

            .question__answer h4 {
                font-size: 1.1rem;
            }

            .question__answer p {
                font-size: 0.95rem;
            }
        }

        /* For Mobile */
        @media (max-width: 480px) {
            .faqs {
                padding: 40px 5%;
            }

            .faqs h2 {
                font-size: 1.6rem;
            }

            .faq {
                padding: 15px;
            }

            .faq__icon {
                font-size: 22px;
                right: 10px;
                top: 10px;
            }

            .question__answer h4 {
                font-size: 1rem;
            }

            .question__answer p {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .content {
                flex-direction: column;
                text-align: center;
            }

            .app-image {
                width: 80%;
                order: -1;
            }

            .details {
                text-align: center;
            }

            .button-group {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800, // Animation duration (in ms)
            easing: "ease-in-out", // Easing type
            once: true // Animate only once when scrolling
        });
    </script>

    <section class="adds" data-aos="fade-up">
        <div class="container">
            <header>
                <h1>Discover the Best Poultry Marketplace and Guide App</h1>
                <p>Effortlessly manage your poultry farm with our feature-packed mobile app.</p>
            </header>
            <div class="content">
                <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Poultry App"
                    class="app-image"
                    onclick="showInfoModal()">
                <div class="details">
                    <ul>
                        <li>Livestock poultry marketplace</li>
                        <li>Watch live buy and sell</li>
                        <li>Guide on how to raise a poultry</li>
                        <li>Ai featured poultry app</li>
                    </ul>
                    <div class="button-group">
                        <a href="#" class="button" onclick="showCustomAlert(this)">Download Apk</a>
                        <a href="https://play.google.com/store" class="button" target="_blank">Get on Google Play</a>
                        <a href="#" class="button" onclick="goBack()">Back</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="info-modal" class="modal">
            <h2>Poultry App Features</h2>
            <p>Our app provides a seamless experience for poultry farmers and buyers. Get real-time market updates, AI-powered assistance, and expert guides.</p>
            <button onclick="closeInfoModal()">Close</button>
        </div>

        <div id="custom-alert" class="custom-alert">
            <p>Thank you for downloading, your download will be starting shortly....</p>
            <button onclick="closeAlert()">OK</button>
        </div>

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
                        <h4>What is the Poultry Marketplace and Guide App?</h4>
                        <p>It is a feature-rich mobile app designed to help poultry farmers buy and sell livestock,
                            get real-time market updates, and access AI-powered farming assistance.</p>
                    </div>
                </article>

                <article class="faq">
                    <div class="faq__icon"><i class="uil uil-plus"></i></div>
                    <div class="question__answer">
                        <h4>How does the livestock marketplace work?</h4>
                        <p>The marketplace allows users to buy and sell poultry in real time. You can list your livestock, negotiate prices,
                            and connect with potential buyers or sellers.</p>
                    </div>
                </article>

                <article class="faq">
                    <div class="faq__icon"><i class="uil uil-plus"></i></div>
                    <div class="question__answer">
                        <h4>How does the AI feature help in poultry farming?</h4>
                        <p>The AI-powered feature provides smart recommendations on disease detection, ideal feed combinations, and market price predictions.</p>
                    </div>
                </article>

                <article class="faq">
                    <div class="faq__icon"><i class="uil uil-plus"></i></div>
                    <div class="question__answer">
                        <h4>What kind of guides does the app provide?</h4>
                        <p>The app offers step-by-step guides on poultry farming, including feeding, housing, disease prevention, and business tips.</p>
                    </div>
                </article>
                <article class="faq">
                    <div class="faq__icon"><i class="uil uil-plus"></i></div>
                    <div class="question__answer">
                        <h4>Is the app free to download?</h4>
                        <p>Yes, the app is free to download, but some premium features may require a subscription.</p>
                    </div>
                </article>
                <article class="faq">
                    <div class="faq__icon"><i class="uil uil-plus"></i></div>
                    <div class="question__answer">
                        <h4>Where can I download the app?</h4>
                        <p>You can download the APK directly from our website or get it from the Google Play Store.</p>
                    </div>
                </article>
                <article class="faq">
                    <div class="faq__icon"><i class="uil uil-plus"></i></div>
                    <div class="question__answer">
                        <h4>How do I contact support if I have issues with the app?</h4>
                        <p>You can reach out to our support team through the in-app help section or email us at [chickmart@support.com].</p>
                    </div>
                </article>

            </div>
        </section>
        <section class="testimonials" data-aos="fade-up">
            <h2>What Our Users Say</h2>
            <div class="testimonial-container">
                <div class="testimonial">
                    <img src="./Images/profilepic.jpg" alt="John Doe">
                    <p>"I love the app my cock became bigger"</p>
                    <h4>- Leonel M.</h4>
                </div>
                <div class="testimonial">
                    <img src="./Images/profilepic.jpg" alt="Jane Smith">
                    <p>"I love to see how the cocks grow"</p>
                    <h4>- Arkin P.</h4>
                </div>
                <div class="testimonial">
                    <img src="./Images/profilepic.jpg" alt="Michael Brown">
                    <p>"Buy and sell cock is the best!"</p>
                    <h4>- Christian B.</h4>
                </div>
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

        <script>
            function showCustomAlert(button) {
                button.classList.add('downloading');
                button.innerHTML = "Downloading...";
                setTimeout(() => {
                    document.getElementById('custom-alert').style.display = 'block';
                }, 2000);
            }

            function closeAlert() {
                document.getElementById('custom-alert').style.display = 'none';
                document.querySelector('.button').classList.remove('downloading');
                document.querySelector('.button').innerHTML = "Download Now";
            }

            function goBack() {
                window.history.back();
            }

            function showInfoModal() {
                document.getElementById("info-modal").style.display = "block";
            }

            function closeInfoModal() {
                document.getElementById("info-modal").style.display = "none";
            }
        </script>
    </section>
</body>

</html>