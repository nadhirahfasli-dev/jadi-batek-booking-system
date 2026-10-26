<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immersive Video Experience | Jadi Batek Workshop</title>

    <!-- FontAwesome Icons & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,500;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gold: #c59a45;
            --primary-gold-glow: rgba(197, 154, 69, 0.35);
            --primary-red: #e84c55;
            --hover-red: #ff5252;
            --dark-accent: #191412;
            --bg-light: #faf8f5;
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
            background: var(--bg-light);
            color: var(--dark-accent);
        }

        /* NAVBAR TRANSPARENT */
        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 30;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 60px;
            height: 105px;
            width: 100%;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0) 100%);
        }

        .logo-img {
            height: 75px;
            width: auto;
            display: block;
            object-fit: contain;
            filter: drop-shadow(0px 2px 5px rgba(0, 0, 0, 0.12));
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

        /* HEADER HERO CINEMATIC (CLEAR & SHARP IMAGE1.JPG BACKGROUND) */
        .video-hero {
            position: relative;
            padding: 170px 20px 60px 20px;
            text-align: center;
            /* Latar belakang image1.jpg tajam dengan lapisan penapis tona nipis */
            background: linear-gradient(135deg, rgba(250, 248, 245, 0.82) 0%, rgba(245, 240, 232, 0.88) 100%),
                url('image1.jpg') center/cover no-repeat fixed;
            overflow: hidden;
        }

        .video-hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-red), var(--primary-gold));
            border-radius: 2px;
        }

        .hero-sub {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--primary-gold);
            margin-bottom: 12px;
            display: inline-block;
            background: rgba(255, 255, 255, 0.85);
            padding: 6px 18px;
            border-radius: 30px;
            border: 1px solid rgba(197, 154, 69, 0.35);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }

        .hero-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 56px;
            color: var(--dark-accent);
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.1;
            text-shadow: 0 2px 4px rgba(255, 255, 255, 0.6);
        }

        .hero-desc {
            max-width: 650px;
            margin: 0 auto;
            font-size: 15px;
            color: #333333;
            font-weight: 500;
            line-height: 1.8;
        }

        /* DUAL FEATURED VIDEO SHOWCASE SECTION */
        .main-showcase-section {
            max-width: 1280px;
            margin: 60px auto 100px auto;
            padding: 0 40px;
        }

        .dual-video-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }

        .cinema-card {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(25, 20, 18, 0.08);
            border: 1px solid rgba(197, 154, 69, 0.25);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
        }

        .cinema-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(197, 154, 69, 0.2);
            border-color: var(--primary-red);
        }

        .media-frame {
            position: relative;
            width: 100%;
            height: 360px;
            background: #000;
            overflow: hidden;
        }

        .media-frame video,
        .media-frame iframe {
            width: 100%;
            height: 100%;
            border: none;
            display: block;
            object-fit: cover;
        }

        .badge-tag {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(25, 20, 18, 0.82);
            backdrop-filter: blur(8px);
            color: var(--primary-gold);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 7px 16px;
            border-radius: 20px;
            border: 1px solid rgba(197, 154, 69, 0.4);
            z-index: 5;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .card-details {
            padding: 30px 32px 35px 32px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: #ffffff;
        }

        .card-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 30px;
            font-weight: 700;
            color: var(--dark-accent);
            margin-bottom: 12px;
            line-height: 1.2;
        }

        .card-text {
            font-size: 14px;
            color: #666666;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .card-meta {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 12px;
            color: var(--primary-gold);
            font-weight: 600;
            border-top: 1px solid rgba(197, 154, 69, 0.15);
            padding-top: 18px;
        }

        .card-meta span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .dual-video-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .media-frame {
                height: 320px;
            }

            .main-showcase-section {
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        @media (max-width: 576px) {
            .media-frame {
                height: 240px;
            }

            .hero-title {
                font-size: 40px;
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
                box-sizing: border-box;
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

            .video-hero {
                padding-top: 110px;
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

        @media (max-width: 768px),
        (max-height: 500px) and (orientation: landscape) {
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

            .video-hero {
                padding-top: 110px;
            }
        }
    </style>
    <link rel="stylesheet" href="responsive.css">
</head>

<body>

    <!-- NAVBAR TRANSPARENT -->
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
            <li><a href="welcome.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="gallery.php">GALLERY</a></li>
            <li><a href="video.php" class="active">VIDEO</a></li>
            <li><a href="booking.php">BOOKING</a></li>
            <li><a href="contact.php">CONTACT</a></li>
        </ul>

        <button class="search-btn-only" type="button" onclick="openSearchModal()" aria-label="Open search">
            <svg class="mobile-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <circle cx="11" cy="11" r="7"></circle>
                <path d="m20 20-4-4"></path>
            </svg>
            <i class="fas fa-search"></i>
        </button>

    </nav>

    <!-- HEADER HERO VIDEO -->
    <header class="video-hero">
        <span class="hero-sub">Cinematic Heritage Journey</span>
        <h1 class="hero-title">Video Showcase</h1>
        <p class="hero-desc">
            Immerse yourself in the world of Malaysian Batik. Discover leadership insights from our CEO and experience the authentic joy of our hands-on coloring workshops.
        </p>
    </header>

    <!-- DUAL FEATURED VIDEO SHOWCASE SECTION -->
    <section class="main-showcase-section">
        <div class="dual-video-grid">

            <!-- VIDEO 1: INTERVIEW CEO (LOCAL MP4) -->
            <div class="cinema-card">
                <div class="media-frame">
                    <span class="badge-tag"><i class="fas fa-user-tie"></i> Leadership Insight</span>
                    <!-- YouTube Embed Iframe -->
                    <iframe
                        src="https://www.youtube.com/embed/1PTW3_wcHKw"
                        title="Interview with Our CEO"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="card-details">
                    <div>
                        <h2 class="card-title">Interview with Our CEO</h2>
                        <p class="card-text">
                            Gain exclusive insights into the vision, history, and passion behind Jadi Batek as our CEO shares the journey of preserving traditional Malaysian batik artistry since 1976.
                        </p>
                    </div>
                    <div class="card-meta">
                        <span><i class="fas fa-clock"></i> Exclusive Video</span>
                        <span><i class="fas fa-certificate"></i> Official Interview</span>
                    </div>
                </div>
            </div>

            <!-- VIDEO 2: BATIK COLORING CLASS (YOUTUBE EMBED) -->
            <div class="cinema-card">
                <div class="media-frame">
                    <span class="badge-tag"><i class="fas fa-palette"></i> Workshop Class</span>
                    <iframe
                        src="https://www.youtube.com/embed/5QkpRdfmysI?enablejsapi=1"
                        title="Batik Experience Coloring Class"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="card-details">
                    <div>
                        <h2 class="card-title">Batik Coloring Class Experience</h2>
                        <p class="card-text">
                            Step inside our lively workshop environment and witness visitors from all around the world unleashing their creativity through vibrant fabric dye coloring sessions.
                        </p>
                    </div>
                    <div class="card-meta">
                        <span><i class="fab fa-youtube"></i> HD Quality</span>
                        <span><i class="fas fa-users"></i> Visitor Highlights</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

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