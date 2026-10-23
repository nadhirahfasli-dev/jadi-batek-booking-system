<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadi Batek Workshop</title>
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
    </style>
</head>

<body>

    <header class="hero-section">
        <!-- VIDEO BACKGROUND -->
        <video autoplay loop muted playsinline class="bg-video">
            <source src="video1.mp4" type="video/mp4">
            <source src="images/video1.mp4" type="video/mp4">
        </video>

        <!-- NAVBAR -->
        <nav class="navbar">
            <div class="logo">
                <a href="index.php">
                    <img src="logo.png" onerror="this.onerror=null; this.src='images/logo.png';" alt="Jadi Batek Logo" class="logo-img">
                </a>
            </div>

            <ul class="nav-links">
                <li><a href="index.php" class="active">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="gallery.php">GALLERY</a></li>
                <li><a href="video.php">VIDEO</a></li>
                <li><a href="booking.php">BOOKING</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>

            <!-- IKON SEARCH SAHAJA -->
            <button class="search-btn-only" type="button" onclick="openSearchModal()">
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

</body>

</html>