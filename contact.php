<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Jadi Batek Gallery</title>

    <!-- FontAwesome 6.5.1 CDN & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,500;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gold: #c59a45;
            --primary-red: #e84c55;
            --hover-red: #ff5252;
            --dark-accent: #191412;
            --gold-glow: rgba(197, 154, 69, 0.35);
            --red-glow: rgba(232, 76, 85, 0.35);
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

        /* FULL PAGE BLURRED BACKGROUND */
        body,
        html {
            width: 100%;
            min-height: 100vh;
            overflow-x: hidden;
            color: var(--dark-accent);
            background: linear-gradient(135deg, rgba(250, 248, 245, 0.82) 0%, rgba(245, 240, 232, 0.88) 100%),
                url('image17.jpg') center/cover no-repeat fixed;
            backdrop-filter: blur(10px);
        }

        /* NAVBAR TRANSPARENT */
        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 60px;
            height: 105px;
            width: 100%;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.88) 0%, rgba(255, 255, 255, 0) 100%);
            animation: fadeInDown 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .logo-img {
            height: 75px;
            width: auto;
            display: block;
            object-fit: contain;
            filter: drop-shadow(0px 2px 5px rgba(0, 0, 0, 0.12));
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .logo-img:hover {
            transform: scale(1.06) rotate(-1deg);
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
            cursor: pointer;
            position: relative;
            z-index: 101;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0%;
            height: 2px;
            background: var(--primary-red);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 100%;
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
            position: relative;
            z-index: 101;
        }

        .search-btn-only:hover {
            color: var(--primary-red);
            transform: scale(1.2) rotate(8deg);
        }

        /* HEADER HERO CONTACT */
        .contact-hero {
            position: relative;
            padding: 175px 40px 45px 40px;
            text-align: center;
            overflow: hidden;
            z-index: 1;
            animation: fadeInUp 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .contact-hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 140px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-red), var(--primary-gold));
            border-radius: 2px;
            animation: lineExpand 1.2s ease forwards;
        }

        .hero-sub {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--primary-gold);
            margin-bottom: 12px;
            display: inline-block;
            background: rgba(255, 255, 255, 0.95);
            padding: 8px 22px;
            border-radius: 30px;
            border: 1px solid rgba(197, 154, 69, 0.4);
            box-shadow: 0 4px 18px rgba(197, 154, 69, 0.15);
            animation: pulseGlow 3s infinite ease-in-out;
        }

        .hero-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 60px;
            color: var(--dark-accent);
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.1;
            text-shadow: 0 2px 4px rgba(255, 255, 255, 0.6);
        }

        .hero-desc {
            max-width: 800px;
            margin: 0 auto;
            font-size: 16px;
            color: #333333;
            line-height: 1.8;
            font-weight: 500;
        }

        /* MAIN CONTACT CONTAINER */
        .contact-container {
            max-width: 1320px;
            width: 100%;
            margin: 50px auto 40px auto;
            padding: 0 50px;
            display: grid;
            grid-template-columns: 1.1fr 1.2fr;
            gap: 30px;
            align-items: stretch;
        }

        /* LEFT COLUMN - INFO CARDS */
        .contact-info-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 16px;
        }

        .info-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(14px);
            border-radius: 20px;
            padding: 20px 24px;
            border: 2px solid rgba(197, 154, 69, 0.28);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
            display: flex;
            align-items: center;
            gap: 18px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
            opacity: 0;
            animation: staggerFadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .contact-info-wrapper .info-card:nth-child(1) {
            animation-delay: 0.2s;
        }

        .contact-info-wrapper .info-card:nth-child(2) {
            animation-delay: 0.3s;
        }

        .contact-info-wrapper .info-card:nth-child(3) {
            animation-delay: 0.4s;
        }

        .contact-info-wrapper .social-box {
            animation-delay: 0.5s;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--primary-gold), var(--primary-red));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .info-card:hover::before {
            opacity: 1;
        }

        .info-card:hover {
            transform: translateY(-5px) scale(1.015);
            border-color: var(--primary-gold);
            box-shadow: 0 16px 35px var(--gold-glow);
            background: rgba(255, 255, 255, 0.98);
        }

        .info-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, rgba(197, 154, 69, 0.2) 0%, rgba(197, 154, 69, 0.05) 100%);
            color: var(--primary-gold);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(197, 154, 69, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .info-card:hover .info-icon {
            transform: scale(1.15) rotate(-8deg);
            background: linear-gradient(135deg, var(--primary-gold) 0%, #a88034 100%);
            color: #ffffff;
            box-shadow: 0 8px 20px var(--gold-glow);
        }

        .info-content h4 {
            font-size: 17px;
            font-weight: 700;
            color: var(--dark-accent);
            margin-bottom: 4px;
        }

        .info-content p,
        .info-content a {
            font-size: 13.5px;
            color: #444;
            line-height: 1.5;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .info-content a:hover {
            color: var(--primary-red);
            font-weight: 600;
        }

        /* SOCIAL MEDIA BADGES */
        .social-box {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(14px);
            border-radius: 20px;
            padding: 20px 24px;
            border: 2px solid rgba(197, 154, 69, 0.28);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
            opacity: 0;
            animation: staggerFadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .social-box h4 {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark-accent);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .social-box h4::after {
            content: '';
            flex-grow: 1;
            height: 1px;
            background: rgba(197, 154, 69, 0.25);
        }

        .social-links {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .social-btn {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            text-decoration: none;
            transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .social-btn.ig {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        }

        .social-btn.tw {
            background: #000000;
        }

        .social-btn.em {
            background: #5a6b7c;
        }

        .social-btn.yt {
            background: #FF0000;
        }

        .social-btn.wa {
            background: #25D366;
        }

        .social-btn:hover {
            transform: translateY(-6px) scale(1.15) rotate(5deg);
            box-shadow: 0 12px 22px rgba(0, 0, 0, 0.22);
        }

        /* RIGHT COLUMN - CONTACT FORM */
        .contact-form-box {
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(14px);
            border-radius: 22px;
            padding: 28px 32px;
            border: 2px solid rgba(197, 154, 69, 0.35);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            opacity: 0;
            animation: staggerFadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards;
            transition: all 0.4s ease;
        }

        .contact-form-box:hover {
            border-color: var(--primary-gold);
            box-shadow: 0 16px 40px var(--gold-glow);
        }

        .form-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 30px;
            font-weight: 700;
            color: var(--dark-accent);
            margin-bottom: 18px;
            border-bottom: 1.5px solid rgba(197, 154, 69, 0.2);
            padding-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-title i {
            animation: floatIcon 3s ease-in-out infinite;
        }

        .form-grid-contact {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .form-group-c {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group-c.full {
            grid-column: span 2;
        }

        .form-group-c label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--dark-accent);
        }

        .form-control-c {
            width: 100%;
            padding: 11px 16px;
            border-radius: 10px;
            border: 1px solid #e0d5c8;
            background: rgba(250, 248, 245, 0.95);
            font-size: 13.5px;
            color: var(--dark-accent);
            outline: none;
            transition: all 0.3s ease;
        }

        .form-control-c:focus {
            border-color: var(--primary-gold);
            background: #ffffff;
            box-shadow: 0 0 0 3px var(--gold-glow);
            transform: translateY(-2px);
        }

        textarea.form-control-c {
            resize: vertical;
            min-height: 85px;
        }

        .btn-send-msg {
            width: 100%;
            padding: 14px;
            margin-top: 14px;
            background: linear-gradient(135deg, var(--primary-red) 0%, #d63d46 100%);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 8px 20px var(--red-glow);
            position: relative;
            overflow: hidden;
        }

        .btn-send-msg::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(60deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transform: rotate(30deg);
            transition: all 0.6s ease;
            opacity: 0;
        }

        .btn-send-msg:hover::after {
            left: 100%;
            opacity: 1;
        }

        .btn-send-msg:hover {
            background: linear-gradient(135deg, var(--hover-red) 0%, var(--primary-red) 100%);
            transform: translateY(-3px) scale(1.01);
            box-shadow: 0 14px 30px var(--red-glow);
        }

        /* GOOGLE MAP SECTION */
        .map-section {
            max-width: 1320px;
            width: 100%;
            margin: 30px auto 40px auto;
            padding: 0 50px;
            opacity: 0;
            animation: staggerFadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.5s forwards;
        }

        .map-card-container {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(14px);
            border-radius: 22px;
            padding: 18px;
            border: 2px solid rgba(197, 154, 69, 0.35);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
        }

        .map-card-container:hover {
            border-color: var(--primary-gold);
            box-shadow: 0 20px 45px var(--gold-glow);
            transform: translateY(-3px);
        }

        .map-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 10px 14px 10px;
        }

        .map-header h3 {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 26px;
            font-weight: 700;
            color: var(--dark-accent);
        }

        .location-badge {
            font-size: 12px;
            font-weight: 700;
            background: rgba(197, 154, 69, 0.15);
            color: var(--primary-gold);
            padding: 6px 16px;
            border-radius: 30px;
            border: 1px solid rgba(197, 154, 69, 0.3);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .location-badge:hover {
            background: var(--primary-gold);
            color: #ffffff;
            box-shadow: 0 4px 12px var(--gold-glow);
        }

        .map-wrapper {
            border-radius: 16px;
            overflow: hidden;
            height: 380px;
        }

        .map-wrapper iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* ANNOUNCEMENT BAR */
        .bottom-announcement-bar {
            width: 100%;
            background: linear-gradient(135deg, rgba(232, 76, 85, 0.95) 0%, rgba(140, 35, 42, 0.98) 100%);
            backdrop-filter: blur(12px);
            color: #ffffff;
            padding: 16px 50px;
            border-top: 2px solid var(--primary-gold);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 -10px 30px rgba(197, 154, 69, 0.2);
            margin-top: 50px;
        }

        .announcement-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13.5px;
            font-weight: 500;
        }

        .announcement-item i {
            color: #ffe6a3;
            font-size: 18px;
        }

        .announcement-item strong {
            color: #ffe6a3;
            font-weight: 700;
        }

        .announcement-link {
            color: #ffffff;
            text-decoration: underline;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .announcement-link:hover {
            color: #ffe6a3;
        }

        /* SUCCESS MODAL POPUP */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 200;
            background: rgba(15, 12, 11, 0.85);
            backdrop-filter: blur(10px);
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-box {
            background: #ffffff;
            border-radius: 24px;
            padding: 45px 35px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            border: 1px solid var(--primary-gold);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            animation: popIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: rgba(197, 154, 69, 0.15);
            color: var(--primary-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            margin: 0 auto 20px auto;
        }

        .modal-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 34px;
            font-weight: 700;
            color: var(--dark-accent);
            margin-bottom: 10px;
        }

        .modal-desc {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .btn-close-modal {
            padding: 12px 30px;
            background: var(--dark-accent);
            color: #ffffff;
            border: none;
            border-radius: 30px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-close-modal:hover {
            background: var(--primary-gold);
        }

        /* SEARCH OVERLAY MODAL STYLES */
        .search-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 300;
            background: rgba(15, 12, 11, 0.90);
            backdrop-filter: blur(15px);
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .search-overlay.active {
            display: flex;
            opacity: 1;
        }

        .search-close-btn {
            position: absolute;
            top: 35px;
            right: 45px;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--primary-gold);
            border-radius: 50%;
            color: var(--primary-gold);
            font-size: 24px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
            z-index: 310;
        }

        .search-close-btn:hover {
            background: var(--primary-gold);
            color: #ffffff;
            transform: rotate(90deg) scale(1.1);
            box-shadow: 0 0 18px var(--gold-glow);
        }

        .search-box-container {
            max-width: 480px;
            width: 100%;
            text-align: center;
            animation: zoomInSearch 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            padding: 10px;
        }

        .search-modal-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 32px;
            color: #ffffff;
            margin-bottom: 20px;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .search-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input-wrapper input {
            width: 100%;
            padding: 14px 55px 14px 20px;
            border-radius: 40px;
            border: 1.5px solid var(--primary-gold);
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff;
            font-size: 14.5px;
            outline: none;
            backdrop-filter: blur(8px);
            transition: all 0.3s ease;
        }

        .search-input-wrapper input::placeholder {
            color: rgba(255, 255, 255, 0.5);
            font-size: 13.5px;
        }

        .search-input-wrapper input:focus {
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 20px var(--gold-glow);
        }

        .search-input-wrapper button {
            position: absolute;
            right: 6px;
            width: 38px;
            height: 38px;
            background: var(--primary-gold);
            border: none;
            border-radius: 50%;
            color: #ffffff;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-input-wrapper button:hover {
            background: var(--primary-red);
            transform: scale(1.08);
        }

        .search-suggestions {
            margin-top: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            color: rgba(255, 255, 255, 0.6);
            font-size: 12.5px;
        }

        .search-suggestions a {
            color: var(--primary-gold);
            text-decoration: none;
            background: rgba(197, 154, 69, 0.15);
            padding: 4px 12px;
            border-radius: 16px;
            border: 1px solid rgba(197, 154, 69, 0.3);
            transition: all 0.3s ease;
        }

        .search-suggestions a:hover {
            background: var(--primary-gold);
            color: #ffffff;
        }

        /* KEYFRAME ANIMATIONS */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

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

        @keyframes staggerFadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(0.85);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes zoomInSearch {
            from {
                opacity: 0;
                transform: scale(0.92);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes pulseGlow {

            0%,
            100% {
                box-shadow: 0 4px 18px rgba(197, 154, 69, 0.15);
            }

            50% {
                box-shadow: 0 4px 28px rgba(197, 154, 69, 0.38);
            }
        }

        @keyframes floatIcon {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        @keyframes lineExpand {
            from {
                width: 0;
            }

            to {
                width: 140px;
            }
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .contact-container {
                grid-template-columns: 1fr;
                padding: 0 25px;
            }

            .form-grid-contact {
                grid-template-columns: 1fr;
            }

            .form-group-c.full {
                grid-column: span 1;
            }

            .map-section {
                padding: 0 25px;
            }

            .bottom-announcement-bar {
                flex-direction: column;
                text-align: center;
                justify-content: center;
                padding: 20px;
            }

            .search-close-btn {
                top: 20px;
                right: 20px;
                width: 42px;
                height: 42px;
                font-size: 20px;
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

            .contact-hero {
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

            .contact-hero {
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
            <li><a href="video.php">VIDEO</a></li>
            <li><a href="booking.php">BOOKING</a></li>
            <li><a href="contact.php" class="active">CONTACT</a></li>
        </ul>

        <button class="search-btn-only" type="button" onclick="openSearchModal()" aria-label="Open search">
            <svg class="mobile-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <circle cx="11" cy="11" r="7"></circle>
                <path d="m20 20-4-4"></path>
            </svg>
            <i class="fas fa-search"></i>
        </button>

    </nav>

    <!-- HEADER HERO CONTACT -->
    <header class="contact-hero">
        <span class="hero-sub">Get In Touch</span>
        <h1 class="hero-title">Contact Information</h1>
        <p class="hero-desc">
            Connect with Jadi Batek Gallery. We are delighted to answer your inquiries, facilitate workshop bookings, or discuss custom batik art creations.
        </p>
    </header>

    <!-- MAIN CONTACT CONTAINER -->
    <section class="contact-container">

        <!-- CONTACT INFO (LEFT) -->
        <div class="contact-info-wrapper">

            <div class="info-card">
                <div class="info-icon"><i class="fas fa-building"></i></div>
                <div class="info-content">
                    <h4>Gallery Address</h4>
                    <p><strong>JADI BATEK GALLERY SDN. BHD.</strong> (855242-U)<br>30, Jalan Inai, Off Jalan Imbi, 55100 Kuala Lumpur, Malaysia.</p>
                </div>
            </div>

            <div class="info-card">
                <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                <div class="info-content">
                    <h4>Direct Contact</h4>
                    <p>Tel: <a href="tel:+60321451133">60 3 21451133</a></p>
                    <p>Whatsapp: <a href="https://api.whatsapp.com/send/?phone=60136881322&text&type=phone_number&app_absent=0" target="_blank">6013 6881322</a></p>
                </div>
            </div>

            <div class="info-card">
                <div class="info-icon"><i class="fas fa-envelope-open-text"></i></div>
                <div class="info-content">
                    <h4>Email Inquiry</h4>
                    <p><a href="mailto:info@jadibatek.com">info@jadibatek.com</a></p>
                </div>
            </div>

            <!-- SOCIAL MEDIA BADGES -->
            <div class="social-box">
                <h4>Follow us</h4>
                <div class="social-links">
                    <a href="https://www.instagram.com/jadibatek/?hl=en" target="_blank" class="social-btn ig" aria-label="Instagram"><i class="fab fa-instagram"></i></a>

                    <a href="https://x.com/jadibatek" target="_blank" class="social-btn tw" aria-label="X (Twitter)">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="#ffffff">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg>
                    </a>

                    <a href="mailto:info@jadibatek.com" class="social-btn em" aria-label="Email"><i class="fas fa-envelope"></i></a>
                    <a href="https://www.youtube.com/jadibatek" target="_blank" class="social-btn yt" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="https://api.whatsapp.com/send/?phone=60136881322&text&type=phone_number&app_absent=0" target="_blank" class="social-btn wa" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

        </div>

        <!-- CONTACT FORM (RIGHT) -->
        <div class="contact-form-box">
            <h3 class="form-title">Send Us A Message <i class="fas fa-paper-plane" style="font-size: 18px; color: var(--primary-gold);"></i></h3>
            <form id="contactForm" onsubmit="handleContactSubmit(event)">
                <div class="form-grid-contact">

                    <div class="form-group-c full">
                        <label>Your Full Name</label>
                        <input type="text" class="form-control-c" placeholder="e.g. Sarah Jenkins" required>
                    </div>

                    <div class="form-group-c">
                        <label>Email Address</label>
                        <input type="email" class="form-control-c" placeholder="sarah@example.com" required>
                    </div>

                    <div class="form-group-c">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control-c" placeholder="+60 12-345 6789" required>
                    </div>

                    <div class="form-group-c full">
                        <label>Subject</label>
                        <input type="text" class="form-control-c" placeholder="General Inquiry / Workshop / Corporate Group" required>
                    </div>

                    <div class="form-group-c full">
                        <label>Message / Details</label>
                        <textarea class="form-control-c" placeholder="How can we assist your visit or booking today?" required></textarea>
                    </div>

                </div>

                <button type="submit" class="btn-send-msg">
                    <i class="fas fa-paper-plane" style="margin-right: 8px;"></i> Send Message
                </button>
            </form>
        </div>

    </section>

    <!-- GOOGLE MAPS SECTION -->
    <section class="map-section">
        <div class="map-card-container">
            <div class="map-header">
                <h3>Find Us Here</h3>
                <a href="https://www.google.com/maps/search/?api=1&query=Jadi+Batek+Gallery+30+Jalan+Inai+Kuala+Lumpur" target="_blank" style="text-decoration: none;">
                    <span class="location-badge" style="cursor: pointer;">
                        <i class="fas fa-directions"></i> Open in Google Maps
                    </span>
                </a>
            </div>

            <a href="https://www.google.com/maps/search/?api=1&query=Jadi+Batek+Gallery+30+Jalan+Inai+Kuala+Lumpur" target="_blank" title="Click to open Jadi Batek Gallery in Google Maps" style="display: block; position: relative; cursor: pointer;">
                <div class="map-wrapper" style="position: relative;">
                    <div style="position: absolute; inset: 0; z-index: 10; background: transparent;"></div>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.7912443425316!2d101.71618307584102!3d3.1496739968257013!2m3!1f0!0!f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc36283db85bc5%3A0x6b63d9178220084f!2sJadi%20Batek%20Gallery!5e0!3m2!1sen!2smy!4v1700000000000!5m2!1sen!2smy"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        style="pointer-events: none;">
                    </iframe>
                </div>
            </a>
        </div>
    </section>

    <!-- ANNOUNCEMENT BAR -->
    <div class="bottom-announcement-bar">
        <div class="announcement-item">
            <i class="fas fa-clock"></i>
            <span><strong>Workshop Hours:</strong> Open Daily 9:00 AM – 6:00 PM</span>
        </div>
        <div class="announcement-item">
            <i class="fas fa-users"></i>
            <span>Group bookings of 10+ pax enjoy special rates!</span>
        </div>
        <div class="announcement-item">
            <i class="fab fa-whatsapp"></i>
            <span>Need Immediate Response? <a href="https://api.whatsapp.com/send/?phone=60136881322&text&type=phone_number&app_absent=0" target="_blank" class="announcement-link">Chat on WhatsApp</a></span>
        </div>
    </div>

    <!-- SUCCESS MODAL POPUP -->
    <div id="contactSuccessModal" class="modal-overlay">
        <div class="modal-box">
            <div class="success-icon">
                <i class="fas fa-envelope-open-text"></i>
            </div>
            <h3 class="modal-title">Message Sent!</h3>
            <p class="modal-desc">
                Thank you for reaching out to Jadi Batek. We have received your inquiry and our team will get back to you shortly.
            </p>
            <button class="btn-close-modal" onclick="closeContactModal()">Done & Return</button>
        </div>
    </div>

    <!-- SEARCH OVERLAY MODAL -->
    <div id="searchModal" class="search-overlay" onclick="handleOutsideSearchClick(event)">
        <button class="search-close-btn" onclick="closeSearchModal()" aria-label="Close Search">
            <i class="fas fa-times"></i>
        </button>
        <div class="search-box-container">
            <h3 class="search-modal-title">Search Jadi Batek</h3>
            <form action="search.php" method="GET" class="search-form-modal">
                <div class="search-input-wrapper">
                    <input type="text" name="q" placeholder="Search workshops, products..." required>
                    <button type="submit" aria-label="Submit Search"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <div class="search-suggestions">
                <span>Popular:</span>
                <a href="booking.php">Batik Workshop</a>
                <a href="gallery.php">Silk Apparel</a>
                <a href="about.php">Our Story</a>
            </div>
        </div>
    </div>

    <?php include 'search-modal.php'; ?>

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