<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Progress Banner</title>

    <style>
        /* Banner Container */
        .banner {
            width: 100vw;
            height: 85vh;
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 1vh auto;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);


        }

        /* Images Styling */
        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            opacity: 0;
            border-radius: 1rem;
            transition: opacity 1s ease-in-out, transform 3s ease-in-out;
        }

        /* Active Image */
        .banner img.active {
            opacity: 1;
        }

        /* Progress Bar Container */
        .progress-bar {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            width: 80%;
            height: 5px;
            border-radius: 5px;
            gap: 5px;
            /* Space between segments */
            cursor: pointer;
        }

        /* Individual Clickable Progress Segments */
        .progress-segment {
            flex: 1;
            height: 100%;
            background: rgba(255, 255, 255, 0.3);
            position: relative;
            border-radius: 5px;
            overflow: hidden;
        }

        /* Animated Fill for Active Segment */
        .progress-segment.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: #FF6600;
            animation: fillProgress 3s linear;
        }

        @keyframes fillProgress {
            from {
                width: 0%;
            }

            to {
                width: 100%;
            }
        }

        /* Next Button - Hidden by Default */
        .next-btn {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.6);
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: opacity 0.3s, background 0.3s;
            opacity: 0;
            /* Hidden initially */
        }

        /* Show Next Button when Hovering */
        .banner:hover .next-btn {
            opacity: 1;
        }

        /* Button Hover Effect */
        .next-btn:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .next-btn::after {
            content: '>';
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .banner {
                width: 95vw;
                height: 50vh;
            }

            .progress-bar {
                width: 90%;
            }
        }

        @media (max-width: 480px) {
            .banner {
                width: 98vw;
                height: 40vh;
            }

            .progress-bar {
                width: 95%;
            }

            .next-btn {
                padding: 10px;
            }

            .next-btn::after {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

    <div class="banner">
        <img src="./Images/banner.png" class="active">
        <img src="https://images.unsplash.com/photo-1441122456239-401e92b73c65?q=80&w=2071&auto=format&fit=crop">
        <img src="https://images.unsplash.com/photo-1538170989343-ce003278e1a3?q=80&w=2070&auto=format&fit=crop">
        <img src="https://images.unsplash.com/photo-1620136717591-841a4da27e23?q=80&w=2070&auto=format&fit=crop">
        <img src="https://images.unsplash.com/photo-1569466593977-94ee7ed02ec9?q=80&w=1932&auto=format&fit=crop">
        <img src="https://images.unsplash.com/photo-1472430023262-9a743f7570cb?q=80&w=2067&auto=format&fit=crop">
        <img src="https://images.unsplash.com/photo-1589923188651-268a9765e432?q=80&w=2070&auto=format&fit=crop">

        <div class="progress-bar"></div>

        <!-- Next Button (Hidden by Default) -->
        <button class="next-btn"></button>
    </div>

    <script>
        let index = 0;
        const images = document.querySelectorAll('.banner img');
        const progressBar = document.querySelector('.progress-bar');
        const nextButton = document.querySelector('.next-btn');

        // Create clickable progress segments
        images.forEach((_, i) => {
            const segment = document.createElement('div');
            segment.classList.add('progress-segment');
            if (i === 0) segment.classList.add('active');
            segment.addEventListener('click', () => changeImage(i)); // Click event for progress
            progressBar.appendChild(segment);
        });

        const progressSegments = document.querySelectorAll('.progress-segment');

        function changeImage(newIndex = (index + 1) % images.length) {
            images[index].classList.remove('active');
            progressSegments[index].classList.remove('active');

            index = newIndex;

            images[index].classList.add('active');
            progressSegments[index].classList.add('active');

            // Restart animation
            resetProgressAnimation();
        }

        function resetProgressAnimation() {
            progressSegments.forEach(seg => seg.classList.remove('active'));
            setTimeout(() => progressSegments[index].classList.add('active'), 10);
        }

        function updateProgressBar() {
            progressSegments.forEach((segment, i) => {
                segment.classList.remove('active');
                if (i === index) {
                    segment.classList.add('active');
                }
            });
        }

        setInterval(() => {
            changeImage();
            updateProgressBar();
        }, 3000); // Auto-change every 3 sec

        // Next Button Click
        nextButton.addEventListener('click', () => {
            changeImage();
            updateProgressBar();
        });
    </script>

</body>

</html>