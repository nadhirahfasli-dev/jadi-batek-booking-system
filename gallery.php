<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Gallery | Jadi Batek Workshop</title>
    <!-- FontAwesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,500;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gold: #c59a45;
            /* Warna Emas Utama */
            --primary-red: #e84c55;
            /* Warna Merah Utama */
            --hover-red: #ff5252;
            --dark-accent: #1f1917;
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

        /* HEADER HERO GALERI */
        .gallery-hero {
            padding: 160px 20px 40px 20px;
            text-align: center;
            background: linear-gradient(135deg, rgba(250, 248, 245, 0.94) 0%, rgba(245, 240, 232, 0.96) 100%),
                url('image1.jpg') center/cover no-repeat fixed;
        }

        .hero-sub {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--primary-gold);
            margin-bottom: 10px;
            display: block;
        }

        .hero-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 52px;
            color: var(--dark-accent);
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.1;
        }

        .hero-desc {
            max-width: 620px;
            margin: 0 auto;
            font-size: 15px;
            color: #666666;
            line-height: 1.8;
        }

        /* BENTO GRID LAYOUT SHOWCASE */
        .bento-section {
            max-width: 1280px;
            margin: 20px auto 80px auto;
            padding: 0 40px;
        }

        .bento-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-auto-rows: 280px;
            gap: 20px;
        }

        .bento-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            background: #e2d9cd;
        }

        .bento-item.tall {
            grid-row: span 2;
        }

        .bento-item.wide {
            grid-column: span 2;
        }

        .bento-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1), filter 0.5s ease;
        }

        .bento-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 50%, rgba(31, 25, 23, 0.65) 100%);
            opacity: 0;
            display: flex;
            align-items: flex-end;
            padding: 25px;
            transition: opacity 0.4s ease;
        }

        .bento-overlay-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.9);
            color: var(--primary-red);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transform: scale(0.8) translateY(-10px);
            transition: all 0.4s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .bento-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 45px rgba(197, 154, 69, 0.22);
        }

        .bento-item:hover img {
            transform: scale(1.06);
        }

        .bento-item:hover .bento-overlay {
            opacity: 1;
        }

        .bento-item:hover .bento-overlay-icon {
            transform: scale(1) translateY(0);
        }

        /* BAHAGIAN WHAT WE PROVIDE */
        .provide-section {
            padding: 90px 40px 100px 40px;
            text-align: center;
            position: relative;
            border-top: 1px solid rgba(197, 154, 69, 0.25);
            overflow: hidden;
            background: linear-gradient(180deg, rgba(247, 242, 234, 0.92) 0%, rgba(241, 231, 216, 0.95) 100%),
                url('image1.jpg') center/cover no-repeat fixed;
        }

        .provide-header {
            position: relative;
            z-index: 2;
            margin-bottom: 55px;
        }

        .provide-sub {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--primary-gold);
            margin-bottom: 8px;
            display: block;
        }

        .provide-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 50px;
            color: var(--dark-accent);
            font-weight: 700;
            line-height: 1.1;
        }

        .provide-line {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-red), var(--primary-gold));
            margin: 16px auto 0 auto;
            border-radius: 2px;
        }

        /* GRID KAD EXCLUSIVE */
        .provide-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            position: relative;
            z-index: 2;
        }

        .provide-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(5px);
            border-radius: 18px;
            padding: 40px 25px 35px 25px;
            box-shadow: 0 12px 30px rgba(44, 34, 30, 0.08);
            border: 1px solid rgba(197, 154, 69, 0.25);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            overflow: hidden;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .provide-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 22px 45px rgba(232, 76, 85, 0.15);
            border-color: var(--primary-red);
            background: #ffffff;
        }

        .provide-card::before {
            content: attr(data-index);
            position: absolute;
            top: -10px;
            right: 15px;
            font-family: 'Cormorant Garamond', serif;
            font-size: 80px;
            font-weight: 700;
            color: rgba(197, 154, 69, 0.08);
            line-height: 1;
            pointer-events: none;
        }

        .provide-icon-ring {
            width: 75px;
            height: 75px;
            background: rgba(248, 244, 236, 0.9);
            border: 1px solid rgba(197, 154, 69, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: var(--primary-red);
            margin-bottom: 22px;
            transition: all 0.4s ease;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.03);
        }

        .provide-card:hover .provide-icon-ring {
            background: var(--primary-red);
            color: #ffffff;
            border-color: var(--primary-red);
            transform: scale(1.1) rotate(6deg);
            box-shadow: 0 10px 25px rgba(232, 76, 85, 0.3);
        }

        .provide-label {
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--dark-accent);
            margin-bottom: 10px;
        }

        .provide-desc {
            font-size: 13px;
            color: #666666;
            line-height: 1.6;
        }

        /* LIGHTBOX POPUP */
        .lightbox-modal {
            display: none;
            position: fixed;
            z-index: 100;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 12, 11, 0.93);
            backdrop-filter: blur(12px);
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .lightbox-content {
            max-width: 90%;
            max-height: 85vh;
            border-radius: 16px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.2);
            object-fit: contain;
        }

        .lightbox-close {
            position: absolute;
            top: 25px;
            right: 35px;
            color: #ffffff;
            font-size: 32px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .lightbox-close:hover {
            color: var(--hover-red);
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .bento-grid {
                grid-template-columns: repeat(2, 1fr);
                grid-auto-rows: 240px;
            }

            .bento-item.tall {
                grid-row: span 1;
            }

            .bento-item.wide {
                grid-column: span 1;
            }

            .provide-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .navbar {
                padding: 0 20px;
            }

            .bento-section {
                padding: 0 20px;
            }
        }

        @media (max-width: 576px) {
            .bento-grid {
                grid-template-columns: 1fr;
                grid-auto-rows: 250px;
            }

            .provide-grid {
                grid-template-columns: 1fr;
                gap: 20px;
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

        <ul class="nav-links">
            <li><a href="index.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="gallery.php" class="active">GALLERY</a></li>
            <li><a href="video.php">VIDEO</a></li>
            <li><a href="booking.php">BOOKING</a></li>
            <li><a href="contact.php">CONTACT</a></li>
        </ul>

        <button class="search-btn-only" type="button" onclick="openSearchModal()">
            <i class="fas fa-search"></i>
        </button>

    </nav>

    <!-- HEADER GALERI -->
    <header class="gallery-hero">
        <!-- AYAT PILIHAN: CAPTURING HERITAGE & SMILES -->
        <span class="hero-sub">Capturing Heritage & Smiles</span>
        <h1 class="hero-title">Customer Gallery</h1>
        <p class="hero-desc">
            Explore wonderful moments captured during our daily batik workshops and see the beautiful handmade masterpieces crafted by our visitors from around the globe.
        </p>
    </header>

    <!-- BENTO GRID SHOWCASE -->
    <section class="bento-section">
        <div class="bento-grid">

            <!-- GAMBAR 16 (TALL CARD) -->
            <div class="bento-item tall" onclick="openLightbox('image16.png')">
                <img src="image16.png" alt="Batik Workshop Highlight">
                <div class="bento-overlay">
                    <div class="bento-overlay-icon"><i class="fas fa-expand"></i></div>
                </div>
            </div>

            <!-- GAMBAR 11 -->
            <div class="bento-item" onclick="openLightbox('image11.jpg')">
                <img src="image11.jpg" alt="Happy Customer Moment">
                <div class="bento-overlay">
                    <div class="bento-overlay-icon"><i class="fas fa-expand"></i></div>
                </div>
            </div>

            <!-- GAMBAR 10 -->
            <div class="bento-item" onclick="openLightbox('image10.jpg')">
                <img src="image10.jpg" alt="Finished Batik Art 1">
                <div class="bento-overlay">
                    <div class="bento-overlay-icon"><i class="fas fa-expand"></i></div>
                </div>
            </div>

            <!-- GAMBAR 3 (WIDE CARD) -->
            <div class="bento-item wide" onclick="openLightbox('image3.jpg')">
                <img src="image3.jpg" alt="Batik Workshop Moment 1">
                <div class="bento-overlay">
                    <div class="bento-overlay-icon"><i class="fas fa-expand"></i></div>
                </div>
            </div>

            <!-- GAMBAR 4 -->
            <div class="bento-item" onclick="openLightbox('image4.jpg')">
                <img src="image4.jpg" alt="Batik Workshop Moment">
                <div class="bento-overlay">
                    <div class="bento-overlay-icon"><i class="fas fa-expand"></i></div>
                </div>
            </div>

            <!-- GAMBAR 13 -->
            <div class="bento-item" onclick="openLightbox('image13.jpg')">
                <img src="image13.jpg" alt="Batik Coloring Session">
                <div class="bento-overlay">
                    <div class="bento-overlay-icon"><i class="fas fa-expand"></i></div>
                </div>
            </div>

            <!-- GAMBAR 15 -->
            <div class="bento-item" onclick="openLightbox('image15.jpeg')">
                <img src="image15.jpeg" alt="Handmade Masterpiece">
                <div class="bento-overlay">
                    <div class="bento-overlay-icon"><i class="fas fa-expand"></i></div>
                </div>
            </div>

        </div>
    </section>

    <!-- BAHAGIAN WHAT WE PROVIDE -->
    <section class="provide-section">
        <div class="provide-header">
            <span class="provide-sub">Complete Workshop Amenities</span>
            <h2 class="provide-title">What We Provide</h2>
            <div class="provide-line"></div>
        </div>

        <div class="provide-grid">

            <!-- ITEM 1: PAINT BRUSH -->
            <div class="provide-card" data-index="01">
                <div class="provide-icon-ring">
                    <i class="fas fa-paint-brush"></i>
                </div>
                <h3 class="provide-label">Paint Brush</h3>
                <p class="provide-desc">High quality brushes tailored for fine wax canting & coloring.</p>
            </div>

            <!-- ITEM 2: BATIK PAINTING -->
            <div class="provide-card" data-index="02">
                <div class="provide-icon-ring">
                    <i class="fas fa-palette"></i>
                </div>
                <h3 class="provide-label">Batik Painting</h3>
                <p class="provide-desc">Premium fabric dyes for vibrant and durable artistic expressions.</p>
            </div>

            <!-- ITEM 3: BATIK DYEING -->
            <div class="provide-card" data-index="03">
                <div class="provide-icon-ring">
                    <i class="fas fa-droplet"></i>
                </div>
                <h3 class="provide-label">Batik Dyeing</h3>
                <p class="provide-desc">Traditional color fixing process ensuring lasting masterpiece quality.</p>
            </div>

            <!-- ITEM 4: BATIK ARTIST -->
            <div class="provide-card" data-index="04">
                <div class="provide-icon-ring">
                    <i class="fas fa-user-ninja"></i>
                </div>
                <h3 class="provide-label">Batik Artist</h3>
                <p class="provide-desc">Expert master artisans providing hands-on step-by-step guidance.</p>
            </div>

        </div>
    </section>

    <!-- LIGHTBOX MODAL POPUP -->
    <div id="lightboxModal" class="lightbox-modal" onclick="closeLightbox()">
        <span class="lightbox-close">&times;</span>
        <img id="lightboxImg" class="lightbox-content" src="" alt="Enlarged Gallery Image">
    </div>

    <!-- JAVASCRIPT LIGHTBOX LOGIC -->
    <script>
        function openLightbox(imgSrc) {
            const modal = document.getElementById('lightboxModal');
            const modalImg = document.getElementById('lightboxImg');
            modal.style.display = 'flex';
            modalImg.src = imgSrc;
        }

        function closeLightbox() {
            document.getElementById('lightboxModal').style.display = 'none';
        }
    </script>

    <?php include 'search-modal.php'; ?>
    <?php include 'footer.php'; ?>

</body>

</html>