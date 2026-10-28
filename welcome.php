<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Jadi Batek</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body,
        html {
            width: 100%;
            height: 100%;
            overflow: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Latar Belakang Utama image1.jpg */
        .splash-container {
            position: relative;
            width: 100vw;
            height: 100vh;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url('image1.jpg') no-repeat center center/cover;
        }

        /* Kartu Gambar Terapung Berterabur Estetik */
        .floating-image {
            position: absolute;
            border-radius: 6px;
            object-fit: cover;
            filter: blur(10px);
            opacity: 0.82;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.35);
            transition: filter 0.4s ease, transform 0.4s ease, opacity 0.4s ease, box-shadow 0.4s ease;
            cursor: pointer;
            z-index: 10;
            will-change: transform;
        }

        /* Efek Hover/Touch: Gambar Menjadi Jelas & Naik ke Depan */
        .floating-image:hover,
        .floating-image:active {
            filter: blur(0px) !important;
            opacity: 1 !important;
            transform: scale(1.15) rotate(0deg) translateY(-8px) !important;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.6) !important;
            z-index: 500 !important;
        }

        /* -----------------------------------------------------------------
        ANIMASI FLOATING BERLAINAN TEMPO & CONDONG
        ----------------------------------------------------------------- */
        @keyframes float1 {

            0%,
            100% {
                transform: translateY(0px) rotate(-6deg);
            }

            50% {
                transform: translateY(-18px) rotate(-4deg);
            }
        }

        @keyframes float2 {

            0%,
            100% {
                transform: translateY(0px) rotate(8deg);
            }

            50% {
                transform: translateY(-22px) rotate(11deg);
            }
        }

        @keyframes float3 {

            0%,
            100% {
                transform: translateY(0px) rotate(-12deg);
            }

            50% {
                transform: translateY(-15px) rotate(-9deg);
            }
        }

        @keyframes float4 {

            0%,
            100% {
                transform: translateY(0px) rotate(5deg);
            }

            50% {
                transform: translateY(-20px) rotate(2deg);
            }
        }

        /* -----------------------------------------------------------------
        SUSUNAN 10 KARTU GAMBAR KEMAS
        ----------------------------------------------------------------- */

        /* Kiri Atas Sudut (Kembali Potret) */
        .card-1 {
            top: 4%;
            left: 3%;
            width: 13vw;
            height: 32vh;
            animation: float1 6s ease-in-out infinite;
        }

        /* Kiri Atas Dekat Tengah */
        .card-2 {
            top: 22%;
            left: 17%;
            width: 12vw;
            height: 22vh;
            animation: float2 7.2s ease-in-out infinite 0.5s;
        }

        /* Kiri Tengah */
        .card-3 {
            top: 50%;
            left: 2%;
            width: 12vw;
            height: 26vh;
            animation: float3 5.5s ease-in-out infinite 1.2s;
        }

        /* Kiri Bawah */
        .card-4 {
            bottom: 4%;
            left: 15%;
            width: 14vw;
            height: 26vh;
            animation: float4 6.8s ease-in-out infinite 0.8s;
        }

        /* Kanan Atas Sudut (Kembali Potret) */
        .card-5 {
            top: 5%;
            right: 3%;
            width: 13vw;
            height: 34vh;
            animation: float2 6.5s ease-in-out infinite 1.5s;
        }

        /* Kanan Atas Dekat Tengah */
        .card-6 {
            top: 18%;
            right: 17%;
            width: 11vw;
            height: 22vh;
            animation: float1 7.8s ease-in-out infinite 0.3s;
        }

        /* Kanan Tengah */
        .card-7 {
            top: 48%;
            right: 3%;
            width: 13vw;
            height: 26vh;
            animation: float4 6.2s ease-in-out infinite 1.8s;
        }

        /* Kanan Bawah */
        .card-8 {
            bottom: 4%;
            right: 17%;
            width: 14vw;
            height: 24vh;
            animation: float3 5.8s ease-in-out infinite 1s;
        }

        /* 🖼️ BAWAH TENGAH LOGO (LANDSCAPE) */
        .card-9 {
            bottom: 3%;
            left: 42%;
            width: 16vw;
            height: 16vh;
            animation: float1 8.2s ease-in-out infinite 2.2s;
        }

        /* 🖼️ ATAS TENGAH LOGO (LANDSCAPE) */
        .card-10 {
            top: 3%;
            left: 42%;
            width: 16vw;
            height: 16vh;
            z-index: 20;
            animation: float4 6.5s ease-in-out infinite 0.6s;
        }

        /* LOGO CENTER POP-OUT */
        .center-logo-link {
            position: relative;
            z-index: 1000;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-align: center;
        }

        .main-logo {
            display: block;
            max-width: 380px;
            width: 26vw;
            height: auto;
            filter: drop-shadow(0 15px 30px rgba(0, 0, 0, 0.85));
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), filter 0.4s ease;
        }

        .center-logo-link:hover .main-logo {
            transform: scale(1.1);
            filter: drop-shadow(0 22px 45px rgba(0, 0, 0, 0.95)) brightness(1.15);
        }

        /* Responsif Mobile */
        @media (max-width: 768px) {
            .main-logo {
                max-width: 240px;
                width: 65vw;
            }

            .card-1 {
                width: 34vw;
                height: 18vh;
                top: 4%;
                left: 3%;
            }

            .card-5 {
                width: 34vw;
                height: 18vh;
                top: 4%;
                right: 3%;
            }

            .card-4 {
                width: 34vw;
                height: 18vh;
                bottom: 4%;
                left: 3%;
            }

            .card-8 {
                width: 34vw;
                height: 18vh;
                bottom: 4%;
                right: 3%;
            }

            .card-10 {
                width: 36vw;
                height: 12vh;
                top: 3%;
                left: 32%;
            }

            .card-2,
            .card-3,
            .card-6,
            .card-7,
            .card-9 {
                display: none;
            }
        }
    </style>
    <link rel="stylesheet" href="responsive.css">
</head>

<body>

    <div class="splash-container">
        <!-- 10 Kartu Gambar Terapung Berterabur Estetik -->
        <img src="image31.jpg" class="floating-image card-1" alt="Batik 1">
        <img src="image3.jpg" class="floating-image card-2" alt="Batik 2">
        <img src="image5.jpg" class="floating-image card-3" alt="Batik 3">
        <img src="image4.jpg" class="floating-image card-4" alt="Batik 4">
        <img src="image16.png" class="floating-image card-5" alt="Batik 5">
        <img src="image13.jpg" class="floating-image card-6" alt="Batik 6">
        <img src="image28.jpg" class="floating-image card-7" alt="Batik 7">
        <img src="image27.jpg" class="floating-image card-8" alt="Batik 8">
        <img src="image29.jpg" class="floating-image card-9" alt="Batik 9 (Bawah Logo - Landscape)">
        <img src="image10.jpg" class="floating-image card-10" alt="Batik 10 (Atas Logo - Landscape)">

        <!-- Logo Center Pop-Out -->
        <a href="home.php" class="center-logo-link" title="Click to Enter">
            <img src="logo.png" alt="Jadi Batek Logo" class="main-logo">
        </a>
    </div>

</body>

</html>