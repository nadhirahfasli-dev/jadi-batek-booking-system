<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Jadi Batek Workshop</title>
    <!-- FontAwesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,500&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gold: #c59a45;
            /* Warna Emas */
            --primary-red: #e84c55;
            /* Warna Merah Logo */
            --hover-red: #ff5252;
            /* Warna Merah Terang bila Hover */
            --dark-accent: #2c221e;
        }

        html {
            overflow-y: scroll;
            scroll-behavior: smooth;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body,
        html {
            width: 100%;
            min-height: 100vh;
            overflow-x: hidden;
            background-color: #faf8f5;
        }

        /* NAVBAR TRANSPARENT */
        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 20;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 60px;
            height: 105px;
            width: 100%;
            box-sizing: border-box;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0) 100%);
        }

        /* LOGO */
        .logo-img {
            height: 75px;
            width: auto;
            display: block;
            object-fit: contain;
            filter: drop-shadow(0px 2px 5px rgba(0, 0, 0, 0.15));
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 35px;
            margin: 0;
            padding: 0;
        }

        .menu-toggle {
            display: none;
        }

        .nav-links a {
            color: #2b2b2b;
            text-decoration: none;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 2px;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--primary-red);
        }

        /* BUTTON IKON SEARCH */
        .search-btn-only {
            background: transparent;
            border: none;
            color: #2b2b2b;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 5px;
        }

        .search-btn-only:hover {
            color: var(--primary-red);
            transform: scale(1.15);
        }

        /* BAHAGIAN KANDUNGAN UTAMA MEWAH */
        .about-section {
            position: relative;
            padding: 150px 60px 60px 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(250, 248, 245, 0.94) 0%, rgba(245, 240, 232, 0.96) 100%),
                url('image1.jpg') center/cover no-repeat fixed;
        }

        .about-card-wrapper {
            max-width: 1200px;
            width: 100%;
            background: #ffffff;
            border-radius: 16px;
            padding: 50px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(197, 154, 69, 0.2);
            position: relative;
        }

        .about-container {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 50px;
            align-items: center;
        }

        /* STYLES SLIDER GAMBAR SEBELAH KIRI */
        .slider-container {
            position: relative;
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            border: 3px solid #ffffff;
        }

        .slider-wrapper {
            position: relative;
            width: 100%;
            height: 440px;
            background-color: #111;
        }

        .slide-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transform: scale(1.03);
            transition: opacity 0.6s ease-in-out, transform 0.6s ease-in-out;
        }

        .slide-img.active {
            opacity: 1;
            transform: scale(1);
        }

        /* PANAH NAVIGASI MEWAH */
        .prev-btn,
        .next-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.85);
            color: var(--dark-accent);
            border: none;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            transition: all 0.3s ease;
            z-index: 5;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(4px);
        }

        .prev-btn:hover,
        .next-btn:hover {
            background: var(--primary-red);
            color: #ffffff;
            transform: translateY(-50%) scale(1.08);
        }

        .prev-btn {
            left: 18px;
        }

        .next-btn {
            right: 18px;
        }

        /* DOTS INDICATOR */
        .dots-container {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 5;
            background: rgba(0, 0, 0, 0.3);
            padding: 6px 14px;
            border-radius: 20px;
            backdrop-filter: blur(4px);
        }

        .dot {
            width: 8px;
            height: 8px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot.active {
            background-color: var(--primary-gold);
            width: 22px;
            border-radius: 10px;
        }

        /* TEKS SEBELAH KANAN */
        .about-content {
            text-align: left;
        }

        .sub-tag {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--primary-gold);
            margin-bottom: 8px;
            display: block;
        }

        .about-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 42px;
            color: var(--dark-accent);
            margin-bottom: 15px;
            font-weight: 700;
            line-height: 1.2;
        }

        .title-line {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-red), var(--primary-gold));
            margin-bottom: 22px;
            border-radius: 2px;
        }

        .about-text {
            font-size: 15px;
            color: #555555;
            line-height: 1.85;
            margin-bottom: 16px;
        }

        /* HIGHLIGHTS MINI CARDS */
        .highlights-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #f0e8dc;
        }

        .highlight-item {
            text-align: center;
            padding: 12px 8px;
            background: #faf6f0;
            border-radius: 8px;
            border: 1px solid rgba(197, 154, 69, 0.15);
        }

        .highlight-item i {
            font-size: 20px;
            color: var(--primary-red);
            margin-bottom: 6px;
        }

        .highlight-item h4 {
            font-size: 13px;
            color: var(--dark-accent);
            font-weight: 700;
        }

        .highlight-item p {
            font-size: 11px;
            color: #777;
            margin-top: 2px;
        }

        /* BAHAGIAN VISION & MISSION (REKA BENTUK UNIK & COOL) */
        .vision-mission-section {
            padding: 100px 60px 120px 60px;
            background: linear-gradient(180deg, #faf8f5 0%, #f3ece1 100%);
            position: relative;
        }

        .vm-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        /* KAD UNIK COOL VISION & MISSION */
        .vm-card {
            position: relative;
            background: #ffffff;
            border-radius: 20px;
            padding: 45px 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(197, 154, 69, 0.2);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            overflow: hidden;
        }

        .vm-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 45px rgba(232, 76, 85, 0.12);
            border-color: var(--primary-red);
        }

        /* NOMBOR WATERMARK WATERMARK BACKGROUND */
        .vm-card::before {
            content: attr(data-number);
            position: absolute;
            top: -20px;
            right: 20px;
            font-family: 'Cormorant Garamond', serif;
            font-size: 140px;
            font-weight: 700;
            color: rgba(197, 154, 69, 0.06);
            line-height: 1;
            pointer-events: none;
        }

        .vm-icon-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .vm-icon-circle {
            width: 55px;
            height: 55px;
            background: rgba(232, 76, 85, 0.08);
            color: var(--primary-red);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            transition: all 0.3s ease;
        }

        .vm-card:hover .vm-icon-circle {
            background: var(--primary-red);
            color: #ffffff;
            transform: rotate(10deg) scale(1.05);
        }

        .vm-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 42px;
            color: var(--primary-red);
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .vm-divider {
            width: 45px;
            height: 2px;
            background: var(--primary-gold);
            margin-bottom: 20px;
            transition: width 0.3s ease;
        }

        .vm-card:hover .vm-divider {
            width: 80px;
            background: var(--primary-red);
        }

        .vm-text {
            font-size: 15px;
            color: #555555;
            line-height: 1.85;
            text-align: justify;
            position: relative;
            z-index: 2;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .about-container {
                grid-template-columns: 1fr;
            }

            .vm-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .about-card-wrapper {
                padding: 30px;
            }

            .about-section {
                padding: 130px 20px 40px 20px;
            }

            .vision-mission-section {
                padding: 60px 20px;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                position: relative;
                top: auto;
                left: auto;
                display: grid;
                grid-template-columns: minmax(0, 1fr) auto auto;
                align-items: center;
                height: auto;
                gap: 8px;
                padding: 10px 16px;
                background: rgba(255, 255, 255, 0.96);
            }

            .logo-img {
                height: 52px;
                max-width: 100%;
            }

            .nav-links {
                display: none;
                grid-column: 1 / -1;
                width: 100%;
                flex-direction: column;
                align-items: center;
                gap: 0;
                padding: 4px 0;
            }

            .nav-links.is-open {
                display: flex;
            }

            .nav-links li {
                width: 100%;
                text-align: center;
            }

            .nav-links a {
                display: block;
                padding: 10px;
            }

            .nav-links a {
                font-size: 11px;
                letter-spacing: 1px;
            }

            .menu-toggle {
                display: flex;
                width: 42px;
                height: 42px;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 5px;
                padding: 8px;
                color: #2b2b2b;
                background: transparent;
                border: 1px solid currentColor;
                border-radius: 4px;
                cursor: pointer;
            }

            .menu-toggle span {
                display: block;
                width: 22px;
                height: 2px;
                background: currentColor;
            }

            .search-btn-only {
                grid-column: 3;
                grid-row: 1;
            }

            .about-section {
                padding-top: 120px;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                position: absolute;
                top: 0;
                left: 0;
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                height: auto;
                padding: 15px 20px;
                background: transparent;
            }

            .navbar .logo {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .logo-img {
                width: auto;
                max-width: calc(100vw - 140px);
                height: 52px;
                object-fit: contain;
            }

            .menu-toggle {
                position: relative;
                z-index: 2;
                width: 40px;
                height: 40px;
                padding: 6px;
                color: #2b2b2b;
                background: transparent;
                border: 0;
            }

            .menu-toggle span {
                width: 24px;
                height: 2px;
                background: currentColor;
            }

            .nav-links {
                position: absolute;
                top: 100%;
                left: 0;
                z-index: 1;
                width: 100%;
                max-height: calc(100vh - 80px);
                overflow-y: auto;
                padding: 8px 20px 14px;
                background: rgba(20, 20, 20, 0.96);
            }

            .nav-links li {
                width: 100%;
                text-align: center;
            }

            .nav-links a {
                color: #ffffff;
            }

            .search-btn-only {
                position: relative;
                z-index: 2;
                margin-left: auto;
                color: #2b2b2b;
                font-size: 18px;
            }
        }

        @media (max-width: 1024px), (max-height: 500px) and (orientation: landscape) {
            .navbar {
                position: absolute;
                top: 0;
                left: 0;
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                height: auto;
                padding: 15px 20px;
                background: transparent;
            }

            .navbar .logo {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .logo-img {
                width: auto;
                height: 52px;
            }

            .menu-toggle {
                display: flex;
                position: relative;
                z-index: 2;
                width: 40px;
                height: 40px;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 5px;
                padding: 6px;
                color: #2b2b2b;
                background: transparent;
                border: 0;
                cursor: pointer;
            }

            .menu-toggle span {
                display: block;
                width: 24px;
                height: 2px;
                background: currentColor;
            }

            .nav-links {
                position: absolute;
                top: 100%;
                left: 0;
                z-index: 1;
                display: none;
                width: 100%;
                max-height: calc(100vh - 80px);
                flex-direction: column;
                align-items: stretch;
                gap: 0;
                overflow-y: auto;
                padding: 8px 20px 14px;
                background: rgba(20, 20, 20, 0.96);
            }

            .nav-links.is-open {
                display: flex;
            }

            .nav-links li {
                width: 100%;
                text-align: center;
            }

            .nav-links a {
                display: block;
                padding: 12px;
                color: #ffffff;
                font-size: 13px;
                letter-spacing: 1px;
            }

            .search-btn-only {
                position: relative;
                z-index: 2;
                margin-left: auto;
                color: #2b2b2b;
                font-size: 18px;
            }

            .about-section {
                padding-top: 120px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR TRANSPARENT -->
    <nav class="navbar">
        <div class="logo">
            <a href="index.php">
                <img src="logo.png" onerror="this.onerror=null; this.src='images/logo.png';" alt="Jadi Batek Logo" class="logo-img">
            </a>
        </div>

        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-nav-links" aria-label="Open navigation menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <ul class="nav-links" id="site-nav-links">
            <li><a href="index.php">HOME</a></li>
            <li><a href="about.php" class="active">ABOUT</a></li>
            <li><a href="gallery.php">GALLERY</a></li>
            <li><a href="video.php">VIDEO</a></li>
            <li><a href="booking.php">BOOKING</a></li>
            <li><a href="#contact">CONTACT</a></li>
        </ul>
        <button class="search-btn-only" type="button" onclick="openSearchModal()">
            <i class="fas fa-search"></i>
        </button>
    </nav>

    <!-- BAHAGIAN KANDUNGAN UTAMA ABOUT US -->
    <section class="about-section">
        <div class="about-card-wrapper">
            <div class="about-container">

                <!-- KOLUM KIRI: SLIDER GAMBAR (image6.jpg - image9.jpg) -->
                <div class="slider-container">
                    <div class="slider-wrapper">
                        <img src="image6.jpg" class="slide-img active" alt="Jadi Batek Center">
                        <img src="image7.jpg" class="slide-img" alt="Jadi Batek Gallery">
                        <img src="image8.jpg" class="slide-img" alt="Batik Making Workshop">
                        <img src="image9.jpg" class="slide-img" alt="Handicraft Showcase">
                    </div>

                    <!-- PANAH KIRI & KANAN -->
                    <button class="prev-btn" onclick="changeSlide(-1)" aria-label="Previous Slide"><i class="fas fa-chevron-left"></i></button>
                    <button class="next-btn" onclick="changeSlide(1)" aria-label="Next Slide"><i class="fas fa-chevron-right"></i></button>

                    <!-- TITIK NAVIGASI (DOTS) -->
                    <div class="dots-container">
                        <span class="dot active" onclick="currentSlide(0)"></span>
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                </div>

                <!-- KOLUM KANAN: TEKS PENERANGAN EKSKLUSIF -->
                <div class="about-content">
                    <span class="sub-tag">Heritage & Artistry</span>
                    <h1 class="about-title">About Jadi Batek</h1>
                    <div class="title-line"></div>

                    <p class="about-text">
                        Jadi Batek is one of the biggest batik handicraft centers in Kuala Lumpur. Batik tours are available every day and visitors are welcome to enjoy how batik is being made, talk to the artists, and learn the story behind each batik masterpiece. Visitors are also welcomed to create their batik masterpiece to bring back home.
                    </p>
                    <p class="about-text">
                        Besides the batik workshop, there is a retail area to showcase the batik products and Malaysian handicrafts, catering to the diverse creative and artistic needs of visitors from all over the world. We take pride and satisfaction in making our visitors happy.
                    </p>

                    <!-- HIGHLIGHT MINI CARDS -->
                    <div class="highlights-grid">
                        <div class="highlight-item">
                            <i class="fas fa-award"></i>
                            <h4>Est. 1976</h4>
                            <p>Decades of Heritage</p>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-palette"></i>
                            <h4>Authentic</h4>
                            <p>100% Handmade Art</p>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-clock"></i>
                            <h4>Open Daily</h4>
                            <p>9:00 AM - 5:30 PM</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BAHAGIAN VISION & MISSION (DESIGN KEREN & COOL) -->
    <section class="vision-mission-section">
        <div class="vm-container">

            <!-- VISION CARD -->
            <div class="vm-card" data-number="01">
                <div class="vm-icon-header">
                    <div class="vm-icon-circle"><i class="fas fa-eye"></i></div>
                    <h2 class="vm-title">Vision</h2>
                </div>
                <div class="vm-divider"></div>
                <p class="vm-text">
                    Jadi Batek strives to be the epicenter of batik cultures in the world. Batik is our life and we would like batik to be preserved for another 1000 years. We believe that batik which is handmade, comes with soul and cannot be replaced by industrialization and digitalization. We would like to lead in the design, production, promotion and education of batik in the world.
                </p>
            </div>

            <!-- MISSION CARD -->
            <div class="vm-card" data-number="02">
                <div class="vm-icon-header">
                    <div class="vm-icon-circle"><i class="fas fa-bullseye"></i></div>
                    <h2 class="vm-title">Mission</h2>
                </div>
                <div class="vm-divider"></div>
                <p class="vm-text">
                    The mission of Jadi Batek is to enrich the quality of life with batik cultures. We will preserve, innovate and lead the batik arts and provide the best authentic products and experience to our global customers.
                </p>
            </div>

        </div>
    </section>

    <!-- JAVASCRIPT SLIDER -->
    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide-img');
        const dots = document.querySelectorAll('.dot');

        function showSlide(index) {
            if (index >= slides.length) {
                slideIndex = 0;
            }
            if (index < 0) {
                slideIndex = slides.length - 1;
            }

            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            slides[slideIndex].classList.add('active');
            dots[slideIndex].classList.add('active');
        }

        function changeSlide(step) {
            slideIndex += step;
            showSlide(slideIndex);
        }

        function currentSlide(index) {
            slideIndex = index;
            showSlide(slideIndex);
        }

        // Auto-play slider setiap 4 saat
        setInterval(() => {
            changeSlide(1);
        }, 4000);
    </script>

    <?php include 'search-modal.php'; ?>
    <?php include 'footer.php'; ?>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.getElementById('site-nav-links');

        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', String(!isExpanded));
            menuToggle.setAttribute('aria-label', isExpanded ? 'Open navigation menu' : 'Close navigation menu');
            navLinks.classList.toggle('is-open', !isExpanded);
        });

        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.setAttribute('aria-label', 'Open navigation menu');
                navLinks.classList.remove('is-open');
            });
        });
    </script>
</body>

</html>