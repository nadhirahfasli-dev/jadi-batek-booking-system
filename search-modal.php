<!-- SEARCH OVERLAY MODAL (SIMPLE & NICE) -->
<div id="searchModal" class="search-overlay" onclick="handleOutsideSearchClick(event)">
    <div class="search-box-container">
        <!-- BUTANG TUTUP X -->
        <button class="search-close-btn" onclick="closeSearchModal()" aria-label="Close Search">
            <i class="fas fa-times"></i>
        </button>

        <h3 class="search-modal-title">Search</h3>

        <!-- FORM CARIAN -->
        <form action="search.php" method="GET" class="search-form-modal">
            <div class="search-input-wrapper">
                <input type="text" name="q" placeholder="What are you looking for..." required autocomplete="off">
                <button type="submit" aria-label="Submit Search">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <!-- TAG CADANGAN CARIAN -->
        <div class="search-suggestions">
            <a href="booking.php">Workshop</a>
            <a href="gallery.php">Silk Collection</a>
            <a href="about.php">Our Story</a>
        </div>
    </div>
</div>

<!-- STYLES SIMPLE & NICE -->
<style>
    .search-overlay {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 300;
        background: rgba(25, 20, 18, 0.45);
        /* Latar belakang malap lembut */
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        align-items: center;
        justify-content: center;
        padding: 20px;
        opacity: 0;
        transition: opacity 0.25s ease;
    }

    .search-overlay.active {
        display: flex;
        opacity: 1;
    }

    /* KAD CARIAN SIMPLE */
    .search-box-container {
        max-width: 460px;
        width: 100%;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(197, 154, 69, 0.35);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        border-radius: 20px;
        padding: 28px 24px;
        text-align: center;
        position: relative;
        transform: scale(0.95);
        transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .search-overlay.active .search-box-container {
        transform: scale(1);
    }

    /* BUTANG TUTUP X */
    .search-close-btn {
        position: absolute;
        top: 16px;
        right: 18px;
        background: transparent;
        border: none;
        color: #888888;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.2s ease;
        padding: 4px;
    }

    .search-close-btn:hover {
        color: #e84c55;
        transform: scale(1.15);
    }

    .search-modal-title {
        font-family: 'Cormorant Garamond', Georgia, serif;
        font-size: 26px;
        color: #191412;
        margin-bottom: 18px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    /* INPUT CARIAN KEMAS */
    .search-input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-input-wrapper input {
        width: 100%;
        padding: 12px 48px 12px 18px;
        border-radius: 30px;
        border: 1.5px solid #e2d7c7;
        background: #faf8f5;
        color: #191412;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
    }

    .search-input-wrapper input::placeholder {
        color: #999999;
        font-size: 13.5px;
    }

    .search-input-wrapper input:focus {
        background: #ffffff;
        border-color: #c59a45;
        box-shadow: 0 0 0 3px rgba(197, 154, 69, 0.15);
    }

    .search-input-wrapper button {
        position: absolute;
        right: 6px;
        width: 34px;
        height: 34px;
        background: #c59a45;
        border: none;
        border-radius: 50%;
        color: #ffffff;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.25s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-input-wrapper button:hover {
        background: #e84c55;
        transform: scale(1.05);
    }

    /* CHIPS CADANGAN RINGKAS */
    .search-suggestions {
        margin-top: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .search-suggestions a {
        color: #555555;
        text-decoration: none;
        background: #f2ede4;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 12px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .search-suggestions a:hover {
        background: #c59a45;
        color: #ffffff;
    }
</style>

<!-- JAVASCRIPT LOGIC -->
<script>
    function openSearchModal() {
        const modal = document.getElementById('searchModal');
        if (modal) {
            modal.classList.add('active');
            setTimeout(() => {
                const input = modal.querySelector('input');
                if (input) input.focus();
            }, 100);
        }
    }

    function closeSearchModal() {
        const modal = document.getElementById('searchModal');
        if (modal) {
            modal.classList.remove('active');
        }
    }

    function handleOutsideSearchClick(event) {
        if (event.target.id === 'searchModal') {
            closeSearchModal();
        }
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSearchModal();
        }
    });
</script>