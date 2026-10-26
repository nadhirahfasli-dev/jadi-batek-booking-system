<?php
// 1. BACKEND PHP PROCESSING (INSERT INTO DATABASE)
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form POST
    $name           = $_POST['custName'] ?? '';
    $email          = $_POST['custEmail'] ?? '';
    $phone          = $_POST['custPhone'] ?? '';
    $booking_date   = $_POST['bookDate'] ?? '';
    $booking_time   = $_POST['bookTime'] ?? '';
    $activity_name  = $_POST['package_name'] ?? '';
    $pax_count      = (int)($_POST['pax'] ?? 1);
    $total_amount   = (float)($_POST['total_price'] ?? 0);
    $payment_method = $_POST['payment_method'] ?? 'counter';

    // Buat kode referensi booking otomatis (contoh: JB-8A3F2D)
    $booking_ref    = 'JB-' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));
    $status         = 'Pending';

    // SQL Insert disesuaikan dengan struktur kolom phpMyAdmin Anda
    $sql = "INSERT INTO bookings (booking_ref, full_name, email, phone, activity_name, booking_date, booking_time, pax_count, payment_method, total_amount, status, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssidss", $booking_ref, $name, $email, $phone, $activity_name, $booking_date, $booking_time, $pax_count, $payment_method, $total_amount, $status);

    if ($stmt->execute()) {
        echo "SUCCESS";
    } else {
        http_response_code(500);
        echo "ERROR: " . $stmt->error;
    }
    $stmt->close();
    exit(); // Hentikan eksekusi setelah AJAX POST selesai
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Workshop - Jadi Batek</title>

    <!-- FontAwesome & Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-red: #e84c55;
            --hover-red: #c4323b;
            --primary-gold: #c59a45;
            --dark-accent: #2c221e;
            --bg-cream: #faf8f5;
            --red-glow: rgba(232, 76, 85, 0.25);
            --gold-glow: rgba(197, 154, 69, 0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--bg-cream);
            color: var(--dark-accent);
            overflow-x: hidden;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(197, 154, 69, 0.2);
        }

        .logo-img {
            height: 45px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .menu-toggle {
            display: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark-accent);
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 1px;
            transition: color 0.3s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--primary-red);
        }

        .search-btn-only {
            background: none;
            border: none;
            font-size: 18px;
            color: var(--dark-accent);
            cursor: pointer;
        }

        /* HERO HEADER */
        .booking-hero {
            text-align: center;
            padding: 60px 20px 40px 20px;
            background: linear-gradient(180deg, rgba(197, 154, 69, 0.08) 0%, rgba(250, 248, 245, 0) 100%);
        }

        .hero-sub {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--primary-gold);
            font-weight: 700;
        }

        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 48px;
            color: var(--dark-accent);
            margin: 10px 0;
        }

        .hero-desc {
            font-size: 15px;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        /* CONTAINER */
        .booking-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px 60px 20px;
            display: flex;
            flex-direction: column;
            gap: 50px;
        }

        /* PROCESS FLOW */
        .process-flow-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
            background: #fff;
            padding: 30px;
            border-radius: 22px;
            border: 1px solid rgba(197, 154, 69, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        }

        .process-image-wrap img {
            width: 100%;
            border-radius: 16px;
            object-fit: cover;
            height: 100%;
            max-height: 380px;
        }

        .process-cards-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .process-floating-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .process-icon-box {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-gold) 0%, #a88034 100%);
            color: #fff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .process-info h5 {
            font-size: 12px;
            letter-spacing: 1px;
            color: var(--primary-gold);
            margin-bottom: 3px;
        }

        .process-info p {
            font-size: 13px;
            color: #555;
        }

        .process-arrow-step {
            text-align: center;
            color: var(--primary-gold);
            font-size: 12px;
            margin-left: 15px;
            animation: bounceArrow 2s infinite;
        }

        /* TITLES & TABS */
        .section-title-sm {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .step-number {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary-red) 0%, #c4323b 100%);
            color: #fff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 700;
            box-shadow: 0 4px 12px var(--red-glow);
        }

        .category-tabs {
            display: flex;
            gap: 12px;
            margin-bottom: 28px;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 11px 24px;
            border-radius: 30px;
            border: 1px solid rgba(197, 154, 69, 0.35);
            background: rgba(255, 255, 255, 0.88);
            color: var(--dark-accent);
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.35s;
        }

        .tab-btn:hover {
            transform: translateY(-2px);
            border-color: var(--primary-gold);
            box-shadow: 0 8px 20px var(--gold-glow);
        }

        .tab-btn.active {
            background: linear-gradient(135deg, var(--primary-gold) 0%, #a88034 100%);
            color: #ffffff;
            border-color: var(--primary-gold);
            box-shadow: 0 8px 22px var(--gold-glow);
        }

        /* GRID AKTIVITI */
        .package-grid-2col {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .activity-card {
            background: rgba(255, 255, 255, 0.92);
            border-radius: 22px;
            padding: 28px;
            border: 2px solid rgba(197, 154, 69, 0.22);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            animation: cardAppear 0.6s forwards;
        }

        .activity-card:hover {
            border-color: var(--primary-gold);
            transform: translateY(-5px);
            box-shadow: 0 18px 40px var(--gold-glow);
        }

        .activity-card.selected {
            border-color: var(--primary-red);
            background: rgba(255, 253, 252, 0.98);
            box-shadow: 0 18px 40px var(--red-glow);
        }

        .activity-card.selected::after {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 18px;
            right: 18px;
            background: var(--primary-red);
            color: #fff;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            box-shadow: 0 4px 10px var(--red-glow);
            animation: popIn 0.3s ease;
        }

        .activity-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 14px;
        }

        .activity-icon {
            width: 50px;
            height: 50px;
            background: rgba(197, 154, 69, 0.15);
            color: var(--primary-gold);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .badge-tag {
            font-size: 10px;
            padding: 4px 12px;
            border-radius: 12px;
            background: rgba(232, 76, 85, 0.12);
            color: var(--primary-red);
            font-weight: 700;
            text-transform: uppercase;
        }

        .activity-title {
            font-size: 19px;
            font-weight: 700;
            color: var(--dark-accent);
            margin-bottom: 6px;
        }

        .activity-meta {
            font-size: 14px;
            color: #555;
            display: flex;
            gap: 18px;
            margin-bottom: 18px;
        }

        .activity-meta span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .activity-bottom {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            border-top: 1px dashed rgba(197, 154, 69, 0.3);
            padding-top: 16px;
        }

        .price-label {
            font-size: 11px;
            color: #777;
            text-transform: uppercase;
            font-weight: 600;
        }

        .price-val {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-red);
            font-family: 'Cormorant Garamond', serif;
        }

        /* FORM STYLES */
        .form-box {
            background: rgba(255, 255, 255, 0.92);
            border-radius: 22px;
            padding: 40px;
            border: 1px solid rgba(197, 154, 69, 0.3);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full {
            grid-column: span 2;
        }

        .form-group label {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--dark-accent);
        }

        .form-control {
            width: 100%;
            padding: 15px 20px;
            border-radius: 12px;
            border: 1px solid #e2d9cd;
            background: rgba(250, 248, 245, 0.9);
            font-size: 14px;
            color: var(--dark-accent);
            outline: none;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-gold);
            background: #ffffff;
            box-shadow: 0 0 0 4px var(--gold-glow);
        }

        .pax-counter-box {
            display: flex;
            align-items: center;
            background: rgba(250, 248, 245, 0.9);
            border: 1px solid #e2d9cd;
            border-radius: 12px;
            padding: 4px;
            width: fit-content;
        }

        .counter-btn {
            width: 42px;
            height: 42px;
            border: none;
            background: #ffffff;
            color: var(--dark-accent);
            font-size: 16px;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
            transition: all 0.2s ease;
        }

        .counter-btn:hover {
            background: var(--primary-gold);
            color: #ffffff;
        }

        .pax-num-display {
            width: 60px;
            text-align: center;
            font-size: 16px;
            font-weight: 700;
        }

        /* SUMMARY & PAYMENT */
        .summary-card-bottom {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            padding: 40px;
            border: 2px solid rgba(197, 154, 69, 0.35);
            box-shadow: 0 20px 45px rgba(44, 34, 30, 0.08);
        }

        .summary-header {
            border-bottom: 1px solid rgba(197, 154, 69, 0.2);
            padding-bottom: 18px;
            margin-bottom: 22px;
        }

        .summary-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 34px;
            font-weight: 700;
        }

        .summary-details-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 25px;
            background: rgba(250, 248, 245, 0.85);
            padding: 24px;
            border-radius: 16px;
            border: 1px solid #eee8df;
        }

        .summary-item-block {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .summary-item-block span {
            font-size: 11px;
            color: #777;
            text-transform: uppercase;
            font-weight: 700;
        }

        .summary-item-block strong {
            font-size: 16px;
        }

        .payment-options-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .pay-card {
            border: 1px solid #e2d9cd;
            background: rgba(250, 248, 245, 0.85);
            border-radius: 14px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .pay-card:hover {
            border-color: var(--primary-gold);
            background: #ffffff;
        }

        .pay-card.active {
            border-color: var(--primary-red);
            background: #ffffff;
            box-shadow: 0 4px 15px var(--red-glow);
        }

        .pay-card-info {
            display: flex;
            flex-direction: column;
        }

        .pay-card-info strong {
            font-size: 13.5px;
        }

        .pay-card-info span {
            font-size: 11px;
            color: #777;
        }

        .total-box-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .total-label {
            font-size: 20px;
            font-weight: 700;
        }

        .total-price {
            font-size: 42px;
            font-family: 'Cormorant Garamond', serif;
            color: var(--primary-red);
            font-weight: 700;
        }

        .btn-confirm {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, var(--primary-red) 0%, #d63d46 100%);
            color: #ffffff;
            border: none;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.35s;
            box-shadow: 0 10px 25px var(--red-glow);
        }

        .btn-confirm:hover {
            background: linear-gradient(135deg, var(--hover-red) 0%, var(--primary-red) 100%);
            transform: translateY(-3px);
            box-shadow: 0 15px 35px var(--red-glow);
        }

        /* ANNOUNCEMENT BAR */
        .bottom-announcement-bar {
            width: 100%;
            background: linear-gradient(135deg, rgba(232, 76, 85, 0.95) 0%, rgba(140, 35, 42, 0.98) 100%);
            color: #ffffff;
            padding: 16px 50px;
            border-top: 2px solid var(--primary-gold);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 50px;
        }

        .announcement-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13.5px;
        }

        .announcement-item i {
            color: #ffe6a3;
            font-size: 17px;
        }

        .announcement-link {
            color: #ffffff;
            text-decoration: underline;
            font-weight: 700;
        }

        /* SUCCESS MODAL */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: 9999;
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
            animation: popIn 0.4s forwards;
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
            font-family: 'Cormorant Garamond', serif;
            font-size: 34px;
            font-weight: 700;
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
            transition: all 0.3s;
        }

        .btn-close-modal:hover {
            background: var(--primary-gold);
        }

        /* KEYFRAMES & RESPONSIVE */
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

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounceArrow {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(4px);
            }
        }

        @media (max-width: 992px) {

            .process-flow-container,
            .package-grid-2col,
            .payment-options-grid,
            .summary-details-grid,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: span 1;
            }

            .bottom-announcement-bar {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                position: relative;
                top: auto;
                display: grid;
                grid-template-columns: minmax(0, 1fr) auto auto;
                align-items: center;
                gap: 8px;
                padding: 10px 16px;
            }

            .logo-img {
                max-width: 100%;
                height: 42px;
            }

            .nav-links {
                display: none;
                grid-column: 1 / -1;
                width: 100%;
                flex-direction: column;
                align-items: center;
                gap: 0;
                margin: 0;
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
                color: var(--dark-accent);
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
                backdrop-filter: none;
                border-bottom: 0;
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
                color: var(--dark-accent);
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
                color: var(--dark-accent);
                font-size: 18px;
            }

            .booking-hero {
                padding-top: 115px;
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
                backdrop-filter: none;
                border-bottom: 0;
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
                color: var(--dark-accent);
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
                margin: 0;
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
                color: var(--dark-accent);
                font-size: 18px;
            }

            .booking-hero {
                padding-top: 115px;
            }
        }
    </style>
    <link rel="stylesheet" href="responsive.css">
    <style>
        @media (min-width: 769px) {
            .total-box-bottom {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
            }

            .total-price {
                margin-left: auto;
                font-family: inherit;
                font-size: 1.5rem;
                font-weight: 700;
                text-align: right;
                text-transform: uppercase;
                white-space: nowrap;
            }

            .navbar {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1000;
                background: linear-gradient(to bottom, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.6) 60%, transparent 100%) !important;
            }

            .navbar .logo {
                position: static;
                flex: 0 0 150px;
                transform: none;
            }

            .navbar .nav-links {
                position: absolute;
                top: 50%;
                left: 50%;
                display: flex;
                flex: 0 1 auto;
                justify-content: center;
                align-items: center;
                gap: clamp(10px, 1.8vw, 28px);
                width: max-content;
                max-width: calc(100% - 250px);
                max-height: none;
                overflow: visible;
                margin: 0;
                padding: 0;
                background: transparent;
                box-shadow: none;
                transform: translate(-50%, -50%);
            }

            .navbar .nav-links li {
                width: auto;
            }

            .navbar .nav-links a {
                position: relative;
                display: inline-block;
                padding: 10px 0;
                color: #333333;
                font-size: clamp(11px, 1.05vw, 13px);
                font-weight: 700;
                letter-spacing: clamp(0.5px, 0.12vw, 1.5px);
                text-decoration: none;
                text-transform: uppercase;
                white-space: nowrap;
            }

            .navbar .nav-links a::after {
                position: absolute;
                right: 0;
                bottom: 2px;
                left: 0;
                width: 100%;
                height: 2px;
                background: #e84c55;
                content: '';
                transform: scaleX(0);
                transform-origin: left;
                transition: transform 0.25s ease;
            }

            .navbar .nav-links a:hover,
            .navbar .nav-links a.active {
                color: #e84c55;
            }

            .navbar .nav-links a:hover::after,
            .navbar .nav-links a.active::after {
                transform: scaleX(1);
            }

            .navbar .search-btn-only {
                display: flex;
                flex: 0 0 42px;
                align-items: center;
                justify-content: flex-end;
                width: 42px;
                height: 42px;
                margin: 0;
                padding: 8px;
                color: #333333;
                background: none;
                border: none;
                cursor: pointer;
            }

            .navbar .search-btn-only .mobile-search-icon {
                display: block;
                width: 21px;
                height: 21px;
            }

            .navbar .search-btn-only>i {
                display: none;
            }
        }
    </style>
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
            <li><a href="booking.php" class="active">BOOKING</a></li>
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

    <!-- HEADER HERO BOOKING -->
    <header class="booking-hero">
        <span class="hero-sub">Reserve Your Experience</span>
        <h1 class="hero-title">Book A Workshop Slot</h1>
        <p class="hero-desc">
            Select your preferred batik crafting activity, customize options, and secure your session at Jadi Batek.
        </p>
    </header>

    <!-- MAIN BOOKING CONTAINER -->
    <section class="booking-container">

        <!-- SECTION: PROCESS FLOW -->
        <div class="process-flow-container">
            <div class="process-image-wrap">
                <img src="image5.jpg" onerror="this.onerror=null; this.src='images/image5.jpg';" alt="Batik Crafting Session">
            </div>

            <div class="process-cards-list">
                <div class="process-floating-item">
                    <div class="process-icon-box">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <div class="process-info">
                        <h5>BEFORE THE CLASS</h5>
                        <p>We prepare all the materials for you! All you need to do is prepare yourself for some fun!</p>
                    </div>
                </div>

                <div class="process-arrow-step">
                    <i class="fas fa-arrow-down"></i>
                </div>

                <div class="process-floating-item">
                    <div class="process-icon-box" style="background: linear-gradient(135deg, var(--primary-red) 0%, #c4323b 100%);">
                        <i class="fas fa-palette"></i>
                    </div>
                    <div class="process-info">
                        <h5>DURING THE CLASS</h5>
                        <p>Arrive at our workshop and our batik artist will guide through the whole process so you can focus on your masterpiece!</p>
                    </div>
                </div>

                <div class="process-arrow-step">
                    <i class="fas fa-arrow-down"></i>
                </div>

                <div class="process-floating-item">
                    <div class="process-icon-box">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="process-info">
                        <h5>AFTER THE CLASS</h5>
                        <p>Share your masterpiece among the group and enjoy the satisfaction of learning new skills.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- STEP 1: CHOOSE ACTIVITY -->
        <div>
            <h3 class="section-title-sm"><span class="step-number">1</span> Select Your Preferred Activity</h3>

            <div class="category-tabs">
                <button class="tab-btn active" onclick="filterCategory('all', this)">All Options</button>
                <button class="tab-btn" onclick="filterCategory('popular', this)">Most Popular</button>
                <button class="tab-btn" onclick="filterCategory('painting', this)">Canvas Painting</button>
                <button class="tab-btn" onclick="filterCategory('wearables', this)">Wearables & Scarf</button>
            </div>

            <div class="package-grid-2col">
                <!-- ITEM 1 -->
                <div class="activity-card selected" data-cat="popular painting" onclick="selectPackage(this, 'Batik Coloring (Cotton)', 38)">
                    <div>
                        <div class="activity-top">
                            <div class="activity-icon"><i class="fas fa-paint-brush"></i></div>
                            <span class="badge-tag">Popular</span>
                        </div>
                        <h4 class="activity-title">Batik Coloring</h4>
                        <div class="activity-meta">
                            <span><i class="fas fa-layer-group"></i> Cotton</span>
                            <span><i class="far fa-clock"></i> 1 Hour</span>
                        </div>
                    </div>
                    <div class="activity-bottom">
                        <span class="price-label">Price / Pax</span>
                        <span class="price-val">RM 38</span>
                    </div>
                </div>

                <!-- ITEM 2 -->
                <div class="activity-card" data-cat="popular painting" onclick="selectPackage(this, 'Batik Painting & Coloring (Cotton)', 68)">
                    <div>
                        <div class="activity-top">
                            <div class="activity-icon"><i class="fas fa-palette"></i></div>
                            <span class="badge-tag">Best Value</span>
                        </div>
                        <h4 class="activity-title">Batik Painting & Coloring</h4>
                        <div class="activity-meta">
                            <span><i class="fas fa-layer-group"></i> Cotton</span>
                            <span><i class="far fa-clock"></i> 2 Hours</span>
                        </div>
                    </div>
                    <div class="activity-bottom">
                        <span class="price-label">Price / Pax</span>
                        <span class="price-val">RM 68</span>
                    </div>
                </div>

                <!-- ITEM 3 -->
                <div class="activity-card" data-cat="painting" onclick="selectPackage(this, 'Batik Painting & Coloring (Silk)', 88)">
                    <div>
                        <div class="activity-top">
                            <div class="activity-icon"><i class="fas fa-gem"></i></div>
                        </div>
                        <h4 class="activity-title">Batik Painting & Coloring</h4>
                        <div class="activity-meta">
                            <span><i class="fas fa-layer-group"></i> Premium Silk</span>
                            <span><i class="far fa-clock"></i> 2 Hours</span>
                        </div>
                    </div>
                    <div class="activity-bottom">
                        <span class="price-label">Price / Pax</span>
                        <span class="price-val">RM 88</span>
                    </div>
                </div>

                <!-- ITEM 4 -->
                <div class="activity-card" data-cat="wearables" onclick="selectPackage(this, 'Batik Tote Bag', 68)">
                    <div>
                        <div class="activity-top">
                            <div class="activity-icon"><i class="fas fa-shopping-bag"></i></div>
                        </div>
                        <h4 class="activity-title">Batik Tote Bag</h4>
                        <div class="activity-meta">
                            <span><i class="fas fa-layer-group"></i> Cotton Bag</span>
                            <span><i class="far fa-clock"></i> 2 Hours</span>
                        </div>
                    </div>
                    <div class="activity-bottom">
                        <span class="price-label">Price / Pax</span>
                        <span class="price-val">RM 68</span>
                    </div>
                </div>

                <!-- ITEM 5 -->
                <div class="activity-card" data-cat="wearables" onclick="selectPackage(this, 'Batik Scarf Painting (Cotton)', 200)">
                    <div>
                        <div class="activity-top">
                            <div class="activity-icon"><i class="fas fa-scroll"></i></div>
                        </div>
                        <h4 class="activity-title">Batik Scarf Painting</h4>
                        <div class="activity-meta">
                            <span><i class="fas fa-layer-group"></i> Cotton Scarf</span>
                            <span><i class="far fa-clock"></i> 90-120 Mins</span>
                        </div>
                    </div>
                    <div class="activity-bottom">
                        <span class="price-label">Price / Pax</span>
                        <span class="price-val">RM 200</span>
                    </div>
                </div>

                <!-- ITEM 6 -->
                <div class="activity-card" data-cat="wearables" onclick="selectPackage(this, 'Batik Scarf Painting (Silk)', 250)">
                    <div>
                        <div class="activity-top">
                            <div class="activity-icon"><i class="fas fa-crown"></i></div>
                        </div>
                        <h4 class="activity-title">Batik Scarf Painting</h4>
                        <div class="activity-meta">
                            <span><i class="fas fa-layer-group"></i> Pure Silk Scarf</span>
                            <span><i class="far fa-clock"></i> 90-120 Mins</span>
                        </div>
                    </div>
                    <div class="activity-bottom">
                        <span class="price-label">Price / Pax</span>
                        <span class="price-val">RM 250</span>
                    </div>
                </div>

                <!-- ITEM 7 -->
                <div class="activity-card" data-cat="wearables" onclick="selectPackage(this, 'Batik Pareo Painting (Cotton)', 300)">
                    <div>
                        <div class="activity-top">
                            <div class="activity-icon"><i class="fas fa-vest"></i></div>
                        </div>
                        <h4 class="activity-title">Batik Pareo Painting</h4>
                        <div class="activity-meta">
                            <span><i class="fas fa-layer-group"></i> Cotton Pareo</span>
                            <span><i class="far fa-clock"></i> 120-150 Mins</span>
                        </div>
                    </div>
                    <div class="activity-bottom">
                        <span class="price-label">Price / Pax</span>
                        <span class="price-val">RM 300</span>
                    </div>
                </div>

                <!-- ITEM 8 -->
                <div class="activity-card" data-cat="wearables" onclick="selectPackage(this, 'Batik Pareo Painting (Silk)', 400)">
                    <div>
                        <div class="activity-top">
                            <div class="activity-icon"><i class="fas fa-star"></i></div>
                        </div>
                        <h4 class="activity-title">Batik Pareo Painting</h4>
                        <div class="activity-meta">
                            <span><i class="fas fa-layer-group"></i> Silk Pareo</span>
                            <span><i class="far fa-clock"></i> 120-150 Mins</span>
                        </div>
                    </div>
                    <div class="activity-bottom">
                        <span class="price-label">Price / Pax</span>
                        <span class="price-val">RM 400</span>
                    </div>
                </div>

                <!-- ITEM 9 -->
                <div class="activity-card" data-cat="popular wearables" onclick="selectPackage(this, 'Batik T-Shirts (Adult)', 80)">
                    <div>
                        <div class="activity-top">
                            <div class="activity-icon"><i class="fas fa-shirt"></i></div>
                        </div>
                        <h4 class="activity-title">Batik T-Shirt (Adult)</h4>
                        <div class="activity-meta">
                            <span><i class="fas fa-layer-group"></i> Cotton T-Shirt</span>
                            <span><i class="far fa-clock"></i> 60-90 Mins</span>
                        </div>
                    </div>
                    <div class="activity-bottom">
                        <span class="price-label">Price / Pax</span>
                        <span class="price-val">RM 80</span>
                    </div>
                </div>

                <!-- ITEM 10 -->
                <div class="activity-card" data-cat="wearables" onclick="selectPackage(this, 'Batik T-Shirts (Child)', 60)">
                    <div>
                        <div class="activity-top">
                            <div class="activity-icon"><i class="fas fa-child"></i></div>
                        </div>
                        <h4 class="activity-title">Batik T-Shirt (Child)</h4>
                        <div class="activity-meta">
                            <span><i class="fas fa-layer-group"></i> Cotton T-Shirt</span>
                            <span><i class="far fa-clock"></i> 60-90 Mins</span>
                        </div>
                    </div>
                    <div class="activity-bottom">
                        <span class="price-label">Price / Pax</span>
                        <span class="price-val">RM 60</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- STEP 2: SCHEDULE & CONTACT DETAILS -->
        <div>
            <h3 class="section-title-sm"><span class="step-number">2</span> Schedule & Contact Details</h3>
            <div class="form-box">
                <form id="bookingForm" onsubmit="handleBookingSubmit(event)">
                    <!-- INPUT HIDDEN UNTUK DATA JS -->
                    <input type="hidden" name="package_name" id="hiddenPackage" value="Batik Coloring (Cotton)">
                    <input type="hidden" name="pax" id="hiddenPax" value="1">
                    <input type="hidden" name="total_price" id="hiddenTotal" value="38">

                    <div class="form-grid">
                        <div class="form-group full">
                            <label>Full Name</label>
                            <input type="text" name="custName" id="custName" class="form-control" placeholder="e.g. Sarah Jenkins" required>
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="custEmail" id="custEmail" class="form-control" placeholder="sarah@example.com" required>
                        </div>

                        <div class="form-group">
                            <label>Phone / WhatsApp</label>
                            <input type="tel" name="custPhone" id="custPhone" class="form-control" placeholder="+60 12-345 6789" required>
                        </div>

                        <div class="form-group">
                            <label>Preferred Date</label>
                            <input type="date" name="bookDate" id="bookDate" class="form-control" required onchange="updateSummary()">
                        </div>

                        <div class="form-group">
                            <label>Preferred Time Slot</label>
                            <select name="bookTime" id="bookTime" class="form-control" required onchange="updateSummary()">
                                <option value="09:30 AM">09:30 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="02:00 PM">02:00 PM</option>
                                <option value="03:30 PM">03:30 PM</option>
                            </select>
                        </div>

                        <div class="form-group full">
                            <label>Number of Participants</label>
                            <div class="pax-counter-box">
                                <button type="button" class="counter-btn" onclick="changePax(-1)">-</button>
                                <span class="pax-num-display" id="paxDisplay">1</span>
                                <button type="button" class="counter-btn" onclick="changePax(1)">+</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- STEP 3: BOOKING SUMMARY & PAYMENT METHOD -->
        <div>
            <h3 class="section-title-sm"><span class="step-number">3</span> Review & Select Payment Method</h3>
            <div class="summary-card-bottom">
                <div class="summary-header">
                    <h3 class="summary-title">Booking Summary</h3>
                </div>

                <div class="summary-details-grid">
                    <div class="summary-item-block">
                        <span>Selected Activity</span>
                        <strong id="sumPackage">Batik Coloring (Cotton)</strong>
                    </div>

                    <div class="summary-item-block">
                        <span>Date & Time</span>
                        <strong id="sumDateTime">Select Date & Time</strong>
                    </div>

                    <div class="summary-item-block">
                        <span>Participants & Rate</span>
                        <strong id="sumPaxRate">1 Person(s) × RM 38</strong>
                    </div>
                </div>

                <!-- PAYMENT OPTIONS -->
                <div style="margin-bottom: 15px;">
                    <label style="font-size: 12px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: var(--dark-accent); display: block; margin-bottom: 12px; text-align: left;">
                        Select Payment Method
                    </label>

                    <div class="payment-options-grid">
                        <label class="pay-card active" onclick="selectPayment(this)">
                            <input type="radio" name="payment_method" value="fpx" form="bookingForm" checked>
                            <i class="fas fa-university" style="font-size: 20px; color: var(--primary-gold);"></i>
                            <div class="pay-card-info">
                                <strong>Online Banking (FPX)</strong>
                                <span>Maybank, CIMB, RHB, etc.</span>
                            </div>
                        </label>

                        <label class="pay-card" onclick="selectPayment(this)">
                            <input type="radio" name="payment_method" value="card" form="bookingForm">
                            <i class="far fa-credit-card" style="font-size: 20px; color: var(--primary-gold);"></i>
                            <div class="pay-card-info">
                                <strong>Credit / Debit Card</strong>
                                <span>Visa, Mastercard</span>
                            </div>
                        </label>

                        <label class="pay-card" onclick="selectPayment(this)">
                            <input type="radio" name="payment_method" value="counter" form="bookingForm">
                            <i class="fas fa-store" style="font-size: 20px; color: var(--primary-gold);"></i>
                            <div class="pay-card-info">
                                <strong>Pay at Counter</strong>
                                <span>Cash / QR on arrival</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="total-box-bottom">
                    <span class="total-label">Total Amount Payable</span>
                    <span class="total-price" id="sumTotal">RM 38</span>
                </div>

                <button type="submit" form="bookingForm" class="btn-confirm">
                    <i class="fas fa-lock" style="margin-right: 8px;"></i> Pay & Confirm Reservation
                </button>
            </div>
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
            <span>Need Help? <a href="contact.php" class="announcement-link">Contact Us via WhatsApp</a></span>
        </div>
    </div>

    <!-- SUCCESS MODAL POPUP -->
    <div id="successModal" class="modal-overlay">
        <div class="modal-box">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            <h3 class="modal-title">Booking Received!</h3>
            <p class="modal-desc">
                Thank you for reserving your workshop slot with Jadi Batek. Our team will contact you via WhatsApp/Email shortly to finalize details.
            </p>
            <button class="btn-close-modal" onclick="closeSuccessModal()">Done & Return Home</button>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
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

        let selectedPkgName = "Batik Coloring (Cotton)";
        let selectedPkgPrice = 38;
        let paxCount = 1;

        // Tetapkan min date ke tarikh hari ini
        document.getElementById('bookDate').min = new Date().toISOString().split('T')[0];

        function filterCategory(cat, btn) {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const cards = document.querySelectorAll('.activity-card');
            cards.forEach(card => {
                if (cat === 'all') {
                    card.style.display = 'flex';
                } else {
                    const categories = card.getAttribute('data-cat');
                    if (categories && categories.includes(cat)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                }
            });
        }

        function selectPackage(element, pkgName, price) {
            document.querySelectorAll('.activity-card').forEach(card => {
                card.classList.remove('selected');
            });
            element.classList.add('selected');

            selectedPkgName = pkgName;
            selectedPkgPrice = price;

            updateSummary();
        }

        function selectPayment(element) {
            document.querySelectorAll('.pay-card').forEach(card => card.classList.remove('active'));
            element.classList.add('active');
            const radio = element.querySelector('input[type="radio"]');
            if (radio) radio.checked = true;
        }

        function changePax(delta) {
            paxCount += delta;
            if (paxCount < 1) paxCount = 1;
            if (paxCount > 30) paxCount = 30;

            document.getElementById('paxDisplay').textContent = paxCount;
            updateSummary();
        }

        function updateSummary() {
            const dateVal = document.getElementById('bookDate').value;
            const timeVal = document.getElementById('bookTime').value;

            document.getElementById('sumPackage').textContent = selectedPkgName;
            document.getElementById('sumPaxRate').textContent = `${paxCount} Person(s) × RM ${selectedPkgPrice}`;

            if (dateVal) {
                document.getElementById('sumDateTime').textContent = `${dateVal} (${timeVal})`;
            } else {
                document.getElementById('sumDateTime').textContent = `Slot: ${timeVal}`;
            }

            const total = selectedPkgPrice * paxCount;
            document.getElementById('sumTotal').textContent = "RM " + total;

            // Kemaskini input tersembunyi untuk PHP
            document.getElementById('hiddenPackage').value = selectedPkgName;
            document.getElementById('hiddenPax').value = paxCount;
            document.getElementById('hiddenTotal').value = total;
        }

        function handleBookingSubmit(event) {
            event.preventDefault();

            const form = document.getElementById('bookingForm');
            const formData = new FormData(form);

            // Hantar data ke fail ini (booking.php) via POST AJAX
            fetch('booking.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                    document.getElementById('successModal').style.display = 'flex';
                })
                .catch(error => {
                    console.error('Error submitting booking:', error);
                    alert('There is a technical issue. Please try again.');
                });
        }

        function closeSuccessModal() {
            document.getElementById('successModal').style.display = 'none';
            window.location.href = 'welcome.php';
        }

        // Inisialisasi awal
        updateSummary();
    </script>

    <!-- INCLUDE MODAL -->
    <?php include 'search-modal.php'; ?>

</body>

</html>