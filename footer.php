<!-- FOOTER SECTION (COMPACT GLASS TEMA CREAM & GOLD) -->
<footer class="site-footer">
    <div class="footer-container">

        <!-- COLUMN 1: BRAND & INFO -->
        <div class="footer-col brand-col">
            <a href="welcome.php" class="footer-logo-link">
                <img src="logo.png" onerror="this.onerror=null; this.src='images/logo.png';" alt="Jadi Batek Logo" class="footer-logo">
            </a>
            <p class="footer-brand-desc">
                Malaysia’s premier batik handicraft center. Preserving heritage, craftsmanship, and hand-painted batik art since 1976.
            </p>
            <div class="footer-social-links">
                <a href="https://www.instagram.com/jadibatek/?hl=en" target="_blank" class="f-social-btn ig" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://x.com/jadibatek" target="_blank" class="f-social-btn tw" aria-label="X (Twitter)">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="#ffffff">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                    </svg>
                </a>
                <a href="mailto:info@jadibatek.com" class="f-social-btn em" aria-label="Email"><i class="fas fa-envelope"></i></a>
                <a href="https://www.youtube.com/jadibatek" target="_blank" class="f-social-btn yt" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="https://api.whatsapp.com/send/?phone=60136881322&text&type=phone_number&app_absent=0" target="_blank" class="f-social-btn wa" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

        <!-- COLUMN 2: QUICK LINKS -->
        <div class="footer-col">
            <h4 class="footer-heading">Quick Links</h4>
            <ul class="footer-links">
                <li><a href="welcome.php"><i class="fas fa-chevron-right"></i> Home</a></li>
                <li><a href="about.php"><i class="fas fa-chevron-right"></i> About Us</a></li>
                <li><a href="gallery.php"><i class="fas fa-chevron-right"></i> Gallery</a></li>
                <li><a href="video.php"><i class="fas fa-chevron-right"></i> Video Showcase</a></li>
                <li><a href="booking.php"><i class="fas fa-chevron-right"></i> Book Workshop</a></li>
                <li><a href="contact.php"><i class="fas fa-chevron-right"></i> Contact Us</a></li>

                <!-- PAUTAN ADMIN LOGIN DENGAN WARNA GOLD & IKON LOCK -->
                <a href="admin-dashboard.php" style="color: #c59a45; text-decoration: none; font-weight: 600; grid-column: span 2; margin-top: 5px;">
                    <i class="fas fa-lock" style="font-size: 11px; margin-right: 4px;"></i> Admin Staff Login
                </a>
        </div>
    </div>

    </div>

    </div>

    <!-- BOTTOM COPYRIGHT BAR (SEBARIS DENGAN QUICK LINKS) -->
    <div class="footer-bottom">
        <div class="footer-bottom-container">
            <p class="copyright-left">&copy; 2026 All Rights Reserved | <strong>Jadi Batek Gallery Sdn Bhd</strong></p>
            <p class="designed-right">Designed by <strong>Bloomie</strong></p>
        </div>
    </div>
</footer>

<!-- STYLES FOOTER TEMA WEBSITE (CREAM & GOLD) -->
<style>
    .site-footer {
        background: linear-gradient(135deg, rgba(253, 250, 245, 0.92) 0%, rgba(245, 238, 226, 0.95) 100%);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        color: #333333;
        border-top: 2px solid #c59a45;
        box-shadow: 0 -10px 30px rgba(197, 154, 69, 0.1);
        padding: 25px 0 0 0;
        margin-top: 40px;
        position: relative;
        z-index: 50;
    }

    .footer-container {
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
        padding: 0 40px 20px 40px;
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 40px;
    }

    .footer-col {
        display: flex;
        flex-direction: column;
    }

    .footer-logo {
        height: 48px;
        width: auto;
        object-fit: contain;
        margin-bottom: 10px;
        filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.08));
    }

    .footer-brand-desc {
        font-size: 12.5px;
        color: #4a423d;
        line-height: 1.5;
        margin-bottom: 14px;
        max-width: 450px;
        font-weight: 500;
    }

    .footer-heading {
        font-family: 'Cormorant Garamond', Georgia, serif;
        font-size: 20px;
        font-weight: 700;
        color: #191412;
        margin-bottom: 12px;
        position: relative;
        padding-bottom: 6px;
    }

    .footer-heading::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 28px;
        height: 2px;
        background: #e84c55;
        border-radius: 2px;
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 8px 15px;
    }

    .footer-links a {
        color: #3b322c;
        text-decoration: none;
        font-size: 12.5px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .footer-links a i {
        font-size: 9px;
        color: #c59a45;
        transition: transform 0.3s ease;
    }

    .footer-links a:hover {
        color: #e84c55;
        transform: translateX(4px);
    }

    .footer-links a:hover i {
        color: #e84c55;
    }

    .footer-social-links {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .f-social-btn {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.12);
    }

    .f-social-btn.ig {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    }

    .f-social-btn.tw {
        background: #191412;
    }

    .f-social-btn.em {
        background: #5a6b7c;
    }

    .f-social-btn.yt {
        background: #FF0000;
    }

    .f-social-btn.wa {
        background: #25D366;
    }

    .f-social-btn:hover {
        transform: translateY(-3px) scale(1.08);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
    }

    /* BOTTOM BAR DISELARASKAN SEBARIS DENGAN QUICK LINKS */
    .footer-bottom {
        border-top: 1px solid rgba(197, 154, 69, 0.25);
        background: rgba(238, 230, 216, 0.7);
        padding: 12px 0;
    }

    .footer-bottom-container {
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
        padding: 0 40px;
        display: grid;
        grid-template-columns: 2fr 1fr;
        /* Sama nisbah lajur seperti footer-container */
        gap: 40px;
        align-items: center;
        font-size: 12px;
        color: #4a423d;
    }

    .footer-bottom-container strong {
        color: #191412;
    }

    @media (max-width: 768px) {

        .footer-container,
        .footer-bottom-container {
            grid-template-columns: 1fr;
            gap: 20px;
            padding: 0 20px;
        }

        .footer-links {
            grid-template-columns: 1fr;
        }

        .footer-bottom-container {
            text-align: center;
        }
    }
</style>