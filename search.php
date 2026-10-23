<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Jadi Batek Gallery</title>
    <!-- FontAwesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-family/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #faf8f5;
            color: #191412;
            margin: 0;
            padding: 0;
        }

        .search-results-section {
            max-width: 1000px;
            margin: 120px auto 60px auto;
            padding: 0 20px;
            min-height: 60vh;
        }

        .search-header {
            border-bottom: 2px solid rgba(197, 154, 69, 0.3);
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .search-header h2 {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 32px;
            color: #191412;
            margin: 0 0 10px 0;
        }

        .search-query-text {
            color: #c59a45;
            font-weight: 700;
        }

        .search-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .result-card {
            background: #ffffff;
            border: 1px solid rgba(197, 154, 69, 0.25);
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .result-card:hover {
            transform: translateY(-4px);
            border-color: #c59a45;
            box-shadow: 0 8px 25px rgba(197, 154, 69, 0.15);
        }

        .result-title {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 22px;
            font-weight: 700;
            color: #191412;
            margin: 0 0 10px 0;
        }

        .result-desc {
            font-size: 13px;
            color: #666;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .result-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #c59a45;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .result-btn:hover {
            color: #e84c55;
        }

        .no-results {
            text-align: center;
            padding: 50px 20px;
            background: #ffffff;
            border-radius: 12px;
            border: 1px dashed rgba(197, 154, 69, 0.4);
        }

        .no-results i {
            font-size: 40px;
            color: #c59a45;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <!-- KANDUNGAN UTAMA HASIL CARIAN -->
    <main class="search-results-section">
        <?php
        $query = isset($_GET['q']) ? trim($_GET['q']) : '';
        $cleanQuery = htmlspecialchars($query);

        // Senarai data halaman untuk dicari
        $sitePages = [
            [
                'title' => 'Batik Workshop Booking',
                'desc' => 'Experience authentic hand-painted batik making with our interactive workshop sessions.',
                'link' => 'booking.php',
                'keywords' => ['workshop', 'booking', 'class', 'learn', 'activity', 'waxing', 'coloring', 'craft']
            ],
            [
                'title' => 'Gallery Collection',
                'desc' => 'Explore our exclusive collection of hand-drawn batik apparel, silk scarves, and heritage masterpieces.',
                'link' => 'gallery.php',
                'keywords' => ['gallery', 'collection', 'silk', 'scarf', 'apparel', 'painting', 'shirt', 'handicraft']
            ],
            [
                'title' => 'About Jadi Batek',
                'desc' => 'Discover our story and heritage as Malaysia’s premier batik handicraft center since 1976.',
                'link' => 'about.php',
                'keywords' => ['about', 'story', 'history', 'heritage', 'artisan', 'company']
            ],
            [
                'title' => 'Video Showcase',
                'desc' => 'Watch video demonstrations of traditional batik craftsmanship and workshop experiences.',
                'link' => 'video.php',
                'keywords' => ['video', 'watch', 'showcase', 'demonstration', 'tutorial']
            ],
            [
                'title' => 'Contact Us',
                'desc' => 'Get in touch with us for inquiries, group bookings, or visit details.',
                'link' => 'contact.php',
                'keywords' => ['contact', 'location', 'phone', 'email', 'map', 'address', 'hours']
            ]
        ];

        $results = [];

        if (!empty($query)) {
            $searchKey = strtolower($query);
            foreach ($sitePages as $page) {
                // Semak jika kata kunci sepadan dengan tajuk, penerangan, atau keyword
                $inTitle = strpos(strtolower($page['title']), $searchKey) !== false;
                $inDesc = strpos(strtolower($page['desc']), $searchKey) !== false;
                $inKeywords = false;

                foreach ($page['keywords'] as $kw) {
                    if (strpos($kw, $searchKey) !== false) {
                        $inKeywords = true;
                        break;
                    }
                }

                if ($inTitle || $inDesc || $inKeywords) {
                    $results[] = $page;
                }
            }
        }
        ?>

        <div class="search-header">
            <h2>Search Results for: <span class="search-query-text">"<?php echo $cleanQuery; ?>"</span></h2>
            <p><?php echo count($results); ?> matching page(s) found</p>
        </div>

        <?php if (!empty($results)): ?>
            <div class="search-grid">
                <?php foreach ($results as $item): ?>
                    <div class="result-card">
                        <div>
                            <h3 class="result-title"><?php echo $item['title']; ?></h3>
                            <p class="result-desc"><?php echo $item['desc']; ?></p>
                        </div>
                        <a href="<?php echo $item['link']; ?>" class="result-btn">
                            View Page <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-results">
                <i class="fas fa-search-minus"></i>
                <h3>No results found</h3>
                <p>Try searching with different keywords like <strong>workshop</strong>, <strong>silk</strong>, or <strong>gallery</strong>.</p>
            </div>
        <?php endif; ?>
    </main>

    <!-- INCLUDE COMPONENT SEARCH MODAL & FOOTER -->
    <?php include 'search-modal.php'; ?>
    <?php include 'footer.php'; ?>

</body>

</html>