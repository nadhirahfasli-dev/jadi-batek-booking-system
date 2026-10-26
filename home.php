<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadi Batek Workshop | Home</title>
    <!-- FontAwesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-gold: #c59a45;
            /* Warna Emas Bar Bawah */
            --primary-red: #e84c55;
            /* Warna Merah Logo */
            --hover-red: #ff5252;
            /* Warna Merah Terang bila Hover */
        }

        html {
            overflow-y: scroll;
            scroll-behavior: smooth;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body,
        html {
            width: 100%;
            overflow-x: hidden;
            background-color: #ffffff;
        }

        /* HERO SECTION PENUH SKRIN */
        .hero-section {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            background-color: #111111;
        }

        /* BACKGROUND VIDEO FULLSCREEN */
        .bg-video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: 1;
            transform: translate(-50%, -50%);
            object-fit: cover;
            filter: brightness(0.85);
        }

        /* NAVIGATION BAR */
        .navbar {
            position: relative;
            z-index: 10;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 60px;
            height: 105px;
            width: 100%;
            box-sizing: border-box;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%);
        }

        /* LOGO */
        .logo-img {
            height: 75px;
            width: auto;
            display: block;
            object-fit: contain;
            filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.5));
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
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 2px;
            transition: all 0.3s ease;
            text-shadow: 0px 1px 4px rgba(0, 0, 0, 0.8);
            white-space: nowrap;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--hover-red);
        }

        @media (max-width: 768px) {
            .navbar {
                display: grid;
                grid-template-columns: minmax(0, 1fr) auto auto;
                align-items: center;
                gap: 8px;
                height: auto;
                padding: 10px 16px;
                background: rgba(0, 0, 0, 0.35);
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

            .menu-toggle {
                display: flex;
                width: 42px;
                height: 42px;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 5px;
                padding: 8px;
                color: #ffffff;
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

            .nav-links a {
                font-size: 11px;
                letter-spacing: 1px;
            }

            .search-btn-only {
                grid-column: 3;
                grid-row: 1;
            }

            .bg-video {
                width: 100%;
                height: 100%;
                min-width: 0;
                min-height: 0;
                object-fit: contain;
                background: #111111;
            }
        }

        /* BUTTON IKON SEARCH SAHAJA */
        .search-btn-only {
            background: transparent;
            border: none;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-shadow: 0px 1px 4px rgba(0, 0, 0, 0.8);
            padding: 5px;
        }

        .search-btn-only:hover {
            color: var(--hover-red);
            transform: scale(1.15);
        }

        .hero-spacer {
            flex-grow: 1;
        }

        /* ANNOUNCEMENT BAR */
        .announcement-bar {
            position: relative;
            z-index: 10;
            background-color: var(--primary-gold);
            color: #ffffff;
            height: 42px;
            display: flex;
            align-items: center;
            overflow: hidden;
            box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.2);
            pointer-events: none;
        }

        .announcement-track {
            display: flex;
            white-space: nowrap;
            will-change: transform;
            animation: marquee 28s linear infinite;
        }

        .announcement-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 35px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .announcement-item i {
            color: #ffffff;
            font-size: 13px;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* BAHAGIAN UTAMA DENGAN GAMBAR LATAR BELAKANG (image1.jpg) */
        .cta-section {
            position: relative;
            padding: 100px 20px;
            text-align: center;
            /* Meletakkan image1.jpg dengan lapisan gelap transparan supaya teks mudah dibaca */
            background: linear-gradient(rgba(255, 255, 255, 0.88), rgba(255, 255, 255, 0.88)),
                url('image1.jpg') center/cover no-repeat;
        }

        .cta-container {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .cta-title {
            font-family: 'Georgia', serif;
            font-size: 38px;
            color: var(--primary-red);
            margin-bottom: 15px;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .cta-subtitle {
            font-size: 16px;
            color: var(--primary-gold);
            line-height: 1.8;
            margin-bottom: 35px;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 100vh;
                min-height: 80vh;
            }

            .bg-video {
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                min-width: 0;
                min-height: 0;
                transform: none;
                object-fit: cover;
            }

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
                animation: none;
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
                color: #ffffff;
                background: transparent;
                border: 0;
                cursor: pointer;
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
                color: #ffffff;
                font-size: 18px;
            }
        }

        /* STYLES BUTTON BOOK NOW */
        .btn-book-now {
            display: inline-block;
            padding: 16px 42px;
            background-color: var(--primary-gold);
            color: #ffffff;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 2px;
            text-decoration: none;
            text-transform: uppercase;
            border-radius: 4px;
            box-shadow: 0px 4px 15px rgba(197, 154, 69, 0.4);
            transition: all 0.3s ease;
        }

        .btn-book-now:hover {
            background-color: var(--primary-red);
            box-shadow: 0px 6px 20px rgba(232, 76, 85, 0.5);
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 100vh;
                min-height: 80vh;
            }

            .bg-video {
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                max-height: 100vh;
                min-width: 0;
                min-height: 0;
                transform: none;
                object-fit: cover;
            }

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
                color: #ffffff;
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
                color: #ffffff;
                font-size: 18px;
            }
        }
    </style>
    <link rel="stylesheet" href="responsive.css">
    <style>
        @media (min-width: 769px) {
            .home-page .navbar {
                background: transparent !important;
                backdrop-filter: none !important;
            }

            .home-page .navbar .nav-links a,
            .home-page .navbar .nav-links a:hover,
            .home-page .navbar .nav-links a.active {
                color: #ffffff !important;
                text-shadow: 0px 1px 3px rgba(0, 0, 0, 0.6);
            }

            .home-page .navbar .search-btn-only {
                color: #ffffff !important;
            }

            .home-page .navbar .search-btn-only .mobile-search-icon {
                stroke: #ffffff !important;
            }
        }
    </style>
</head>

<body class="home-page">

    <header class="hero-section">
        <!-- VIDEO BACKGROUND -->
        <video autoplay loop muted playsinline class="bg-video">
            <source src="video1new.mp4" type="video/mp4">
            <source src="images/video1new.mp4" type="video/mp4">
        </video>

        <!-- NAVBAR -->
        <nav class="navbar">
            <div class="logo">
                <a href="welcome.php">
                    <img src="logo.png" onerror="this.onerror=null; this.src='images/logo.png';" alt="Jadi Batek Logo" class="logo-img">
                </a>
            </div>

            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-nav-links" aria-label="Open navigation menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav-links" id="site-nav-links">
                <li><a href="welcome.php" class="active">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="gallery.php">GALLERY</a></li>
                <li><a href="video.php">VIDEO</a></li>
                <li><a href="booking.php">BOOKING</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>

            <!-- IKON SEARCH SAHAJA -->
            <button class="search-btn-only" type="button" onclick="openSearchModal()" aria-label="Open search">
                <svg class="mobile-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="m20 20-4-4"></path>
                </svg>
                <i class="fas fa-search"></i>
            </button>
        </nav>

        <div class="hero-spacer"></div>

        <!-- ANNOUNCEMENT BAR -->
        <div class="announcement-bar">
            <div class="announcement-track">
                <div class="announcement-item"><i class="far fa-heart"></i> EXPERIENCE TRADITIONAL BATIK ART <i class="far fa-heart"></i></div>
                <div class="announcement-item"><i class="far fa-heart"></i> BOOK YOURS NOW <i class="far fa-heart"></i></div>
                <div class="announcement-item"><i class="far fa-heart"></i> WELCOME TO JADI BATEK WORKSHOP <i class="far fa-heart"></i></div>
                <div class="announcement-item"><i class="far fa-heart"></i> OPEN DAILY FROM 9:00 AM TO 5:30 PM <i class="far fa-heart"></i></div>

                <div class="announcement-item"><i class="far fa-heart"></i> EXPERIENCE TRADITIONAL BATIK ART <i class="far fa-heart"></i></div>
                <div class="announcement-item"><i class="far fa-heart"></i> BOOK YOURS NOW <i class="far fa-heart"></i></div>
                <div class="announcement-item"><i class="far fa-heart"></i> WELCOME TO JADI BATEK WORKSHOP <i class="far fa-heart"></i></div>
                <div class="announcement-item"><i class="far fa-heart"></i> OPEN DAILY FROM 9:00 AM TO 5:30 PM <i class="far fa-heart"></i></div>
            </div>
        </div>
    </header>

    <!-- BAHAGIAN UTAMA DENGAN BACKGROUND image1.jpg -->
    <section class="cta-section">
        <div class="cta-container">
            <h2 class="cta-title">Discover the Art of Authentic Batik</h2>
            <p class="cta-subtitle">Join our daily interactive workshop sessions and create your very own handmade batik masterpiece under the guidance of expert artisans.</p>

            <!-- BUTANG BOOK NOW -->
            <a href="booking.php" class="btn-book-now">
                <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i> BOOK NOW
            </a>
        </div>
    </section>

    <!-- PANGGILL FAIL SEARCH MODAL & FOOTER -->
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