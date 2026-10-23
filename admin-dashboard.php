<?php
session_start();

// Pengecekan Login Admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin-login.php");
    exit();
}

require_once 'db.php';

// KEMASKINI STATUS TEMPAHAN
if (isset($_POST['update_status'])) {
    $booking_id = (int)$_POST['booking_id'];
    $new_status = mysqli_real_escape_string($conn, $_POST['status']);

    mysqli_query($conn, "UPDATE bookings SET status = '$new_status' WHERE id = $booking_id");
    header("Location: admin-dashboard.php");
    exit();
}

// PADAM TEMPAHAN
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];
    mysqli_query($conn, "DELETE FROM bookings WHERE id = $delete_id");
    header("Location: admin-dashboard.php");
    exit();
}

// KIRA STATISTIK RINGKAS
$total_bookings  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM bookings"))['total'] ?? 0;
$pending_count   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM bookings WHERE status = 'Pending'"))['total'] ?? 0;
$confirmed_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM bookings WHERE status = 'Confirmed'"))['total'] ?? 0;
$total_revenue   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_amount) AS revenue FROM bookings WHERE status != 'Cancelled'"))['revenue'] ?? 0;

// AMBIL SENARAI TEMPAHAN
$result = mysqli_query($conn, "SELECT * FROM bookings ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Jadi Batek</title>

    <!-- Google Fonts & FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* PALET WARNA LOGO JADI BATEK */
            --brand-red: #d93843;
            --brand-red-dark: #a8222b;
            --brand-gold: #c59a45;
            --brand-gold-light: #f7eedb;
            --sidebar-bg: #1c0a0c;
            --card-bg: rgba(255, 255, 255, 0.94);
            --text-dark: #2b1819;
            --text-muted: #7a6869;
            --border-color: #ede4d8;
            --danger-color: #d93843;
            --success-color: #27ae60;
            --warning-color: #e67e22;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            /* LATAR BELAKANG IMAGE6.JPG DENGAN OVERLAY SOFT TINT */
            background: linear-gradient(135deg, rgba(250, 247, 242, 0.88) 0%, rgba(245, 238, 228, 0.92) 100%),
                url('batik.jpg') center/cover no-repeat fixed;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR NAVIGATION */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #1c0a0c 0%, #2b0d10 100%);
            color: #ffffff;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            height: 100vh;
            border-right: 2px solid rgba(197, 154, 69, 0.3);
            z-index: 10;
        }

        .sidebar-brand {
            text-align: center;
            padding-bottom: 25px;
            border-bottom: 1px dashed rgba(197, 154, 69, 0.25);
        }

        .sidebar-brand img {
            max-width: 140px;
            height: auto;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.5));
        }

        .sidebar-brand p {
            font-size: 10px;
            color: var(--brand-gold);
            letter-spacing: 1.5px;
            margin-top: 8px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .nav-menu {
            margin-top: 35px;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .nav-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 18px;
            color: #e3d3d5;
            text-decoration: none;
            border-radius: 12px;
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .nav-item.active a {
            background: linear-gradient(135deg, var(--brand-red) 0%, var(--brand-red-dark) 100%);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(217, 56, 67, 0.3);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #ff99a0;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            padding: 12px 16px;
            border-radius: 10px;
            background: rgba(217, 56, 67, 0.12);
            transition: 0.2s ease;
            border: 1px solid rgba(217, 56, 67, 0.2);
        }

        .logout-btn:hover {
            background: var(--brand-red);
            color: #ffffff;
        }

        /* MAIN WRAPPER */
        .main-wrapper {
            margin-left: 260px;
            flex: 1;
            padding: 40px;
        }

        /* TOP HEADER */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title h1 {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 34px;
            font-weight: 700;
            color: var(--brand-red-dark);
        }

        .page-title p {
            font-size: 13px;
            color: var(--text-muted);
        }

        .btn-create-booking {
            padding: 12px 22px;
            background: linear-gradient(135deg, var(--brand-red) 0%, var(--brand-red-dark) 100%);
            color: #ffffff;
            text-decoration: none;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 6px 18px rgba(217, 56, 67, 0.25);
            transition: 0.3s ease;
        }

        .btn-create-booking:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(217, 56, 67, 0.35);
        }

        /* STATS CARDS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 18px;
            padding: 22px;
            border: 1px solid var(--border-color);
            box-shadow: 0 6px 20px rgba(43, 24, 25, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-card-info h4 {
            font-size: 11px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        .stat-card-info p {
            font-size: 28px;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            color: var(--text-dark);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .icon-total {
            background: #fce8e9;
            color: var(--brand-red);
        }

        .icon-pending {
            background: #fef3e2;
            color: var(--warning-color);
        }

        .icon-confirmed {
            background: #eafaf1;
            color: var(--success-color);
        }

        .icon-revenue {
            background: var(--brand-gold-light);
            color: var(--brand-gold);
        }

        /* DATA TABLE CONTAINER */
        .content-card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 28px;
            border: 1px solid var(--border-color);
            box-shadow: 0 8px 25px rgba(43, 24, 25, 0.06);
        }

        .table-header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .table-header-bar h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 700;
            color: var(--brand-red-dark);
        }

        /* SEARCH INPUT */
        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 9px 16px 9px 38px;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            font-size: 12.5px;
            outline: none;
            width: 230px;
            background: #ffffff;
            transition: 0.3s ease;
        }

        .search-box input:focus {
            width: 290px;
            border-color: var(--brand-red);
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--brand-gold);
            font-size: 13px;
        }

        /* TABLE DESIGN */
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background: rgba(253, 250, 246, 0.8);
            padding: 14px 16px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--brand-red-dark);
            border-bottom: 2px solid var(--border-color);
        }

        td {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
            font-size: 13px;
            vertical-align: middle;
        }

        tr:hover td {
            background: rgba(250, 245, 238, 0.6);
        }

        /* BADGES */
        .badge {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            display: inline-block;
        }

        .badge-pending {
            background: #fef3e2;
            color: var(--warning-color);
            border: 1px solid rgba(230, 126, 34, 0.3);
        }

        .badge-confirmed {
            background: #eafaf1;
            color: var(--success-color);
            border: 1px solid rgba(39, 174, 96, 0.3);
        }

        .badge-cancelled {
            background: #fdeded;
            color: var(--danger-color);
            border: 1px solid rgba(217, 56, 67, 0.3);
        }

        /* ACTION CONTROLS */
        .select-status {
            padding: 6px 10px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            font-size: 11.5px;
            outline: none;
            background: #ffffff;
            cursor: pointer;
        }

        .btn-save {
            padding: 6px 12px;
            background: var(--brand-red);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 11.5px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-save:hover {
            background: var(--brand-red-dark);
        }

        .btn-delete {
            padding: 6px 10px;
            background: rgba(217, 56, 67, 0.1);
            color: var(--danger-color);
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
            transition: 0.2s;
        }

        .btn-delete:hover {
            background: var(--danger-color);
            color: #ffffff;
        }

        .table-scroll {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        @media (max-width: 1024px) {
            .sidebar {
                width: 80px;
                padding: 20px 10px;
            }

            .sidebar-brand img,
            .sidebar-brand p,
            .nav-item span {
                display: none;
            }

            .main-wrapper {
                margin-left: 80px;
                padding: 20px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 1024px),
        (max-height: 500px) and (orientation: landscape) {
            body {
                display: block;
                min-height: 100vh;
                min-height: 100svh;
                background-attachment: scroll;
            }

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: 68px;
                flex-direction: row;
                align-items: center;
                gap: 16px;
                padding: 10px 16px;
                border-right: 0;
                border-bottom: 2px solid rgba(197, 154, 69, 0.3);
            }

            .sidebar>div {
                display: flex;
                align-items: center;
                gap: 16px;
                min-width: 0;
            }

            .sidebar-brand {
                padding: 0;
                border: 0;
            }

            .sidebar-brand img {
                display: block;
                width: auto;
                max-width: 100px;
                max-height: 46px;
            }

            .sidebar-brand p {
                display: none;
            }

            .nav-menu {
                flex-direction: row;
                gap: 6px;
                margin: 0;
            }

            .nav-item span {
                display: inline;
            }

            .nav-item a {
                justify-content: center;
                padding: 10px 12px;
                white-space: nowrap;
            }

            .logout-btn {
                flex-shrink: 0;
                margin-left: auto;
                padding: 10px 12px;
                white-space: nowrap;
            }

            .logout-btn span {
                display: inline;
            }

            .main-wrapper {
                width: 100%;
                min-width: 0;
                margin-left: 0;
                padding: clamp(16px, 3vw, 28px);
            }

            .top-bar {
                flex-wrap: wrap;
                gap: 16px;
            }

            .page-title {
                min-width: 0;
            }

            .page-title h1 {
                font-size: clamp(26px, 4vw, 34px);
                overflow-wrap: anywhere;
            }

            .page-title p {
                line-height: 1.5;
            }

            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 14px;
            }

            .stat-card {
                min-width: 0;
                gap: 12px;
                padding: 16px;
            }

            .stat-card-info {
                min-width: 0;
                overflow-wrap: anywhere;
            }

            .stat-card-info p {
                font-size: clamp(22px, 4vw, 28px);
            }

            .content-card {
                min-width: 0;
                padding: clamp(16px, 3vw, 28px);
            }

            .table-header-bar {
                flex-wrap: wrap;
                gap: 14px;
            }

            .search-box {
                width: min(100%, 300px);
            }

            .search-box input,
            .search-box input:focus {
                width: 100%;
            }

            .table-scroll table {
                min-width: 1000px;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                gap: 8px;
                padding: 10px 12px;
            }

            .sidebar>div {
                gap: 8px;
            }

            .sidebar-brand img {
                max-width: 76px;
            }

            .nav-item a {
                gap: 0;
                padding: 10px;
            }

            .nav-item span,
            .logout-btn span {
                display: none;
            }

            .logout-btn {
                justify-content: center;
                width: 40px;
                height: 40px;
                padding: 0;
            }

            .top-bar {
                align-items: stretch;
            }

            .btn-create-booking {
                justify-content: center;
                align-self: flex-start;
            }

            .stats-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .table-header-bar h3 {
                font-size: 23px;
            }
        }

        @media (max-height: 500px) and (orientation: landscape) {
            .sidebar {
                min-height: 58px;
                padding-top: 6px;
                padding-bottom: 6px;
            }

            .sidebar-brand img {
                max-height: 38px;
            }

            .main-wrapper {
                padding-top: 16px;
            }
        }
    </style>
</head>

<body>

    <!-- LEFT SIDEBAR -->
    <div class="sidebar">
        <div>
            <div class="sidebar-brand">
                <img src="logo.png" alt="Jadi Batek Logo">
                <p>Admin Staff Portal</p>
            </div>

            <!-- MENU HANYA DASHBOARD SAHAJA (NEW BOOKING DAH DIBUANG) -->
            <ul class="nav-menu">
                <li class="nav-item active">
                    <a href="admin-dashboard.php"><i class="fas fa-chart-line"></i> <span>Dashboard</span></a>
                </li>
            </ul>
        </div>

        <a href="admin-login.php" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> <span>Log Out</span>
        </a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-wrapper">

        <!-- TOP BAR (BUTANG + CREATE BOOKING KEKAL DI SINI) -->
        <div class="top-bar">
            <div class="page-title">
                <h1>Workshop Bookings Overview</h1>
                <p>Manage customer workshop reservations and update booking statuses.</p>
            </div>
            <a href="booking.php" target="_blank" class="btn-create-booking">
                <i class="fas fa-plus"></i> Create Booking
            </a>
        </div>

        <!-- STATS CARDS -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-info">
                    <h4>Total Bookings</h4>
                    <p><?php echo $total_bookings; ?></p>
                </div>
                <div class="stat-icon icon-total"><i class="fas fa-calendar-check"></i></div>
            </div>

            <div class="stat-card">
                <div class="stat-card-info">
                    <h4>Pending</h4>
                    <p><?php echo $pending_count; ?></p>
                </div>
                <div class="stat-icon icon-pending"><i class="fas fa-hourglass-half"></i></div>
            </div>

            <div class="stat-card">
                <div class="stat-card-info">
                    <h4>Confirmed</h4>
                    <p><?php echo $confirmed_count; ?></p>
                </div>
                <div class="stat-icon icon-confirmed"><i class="fas fa-check-circle"></i></div>
            </div>

            <div class="stat-card">
                <div class="stat-card-info">
                    <h4>Total Revenue</h4>
                    <p>RM <?php echo number_format($total_revenue, 2); ?></p>
                </div>
                <div class="stat-icon icon-revenue"><i class="fas fa-wallet"></i></div>
            </div>
        </div>

        <!-- BOOKING TABLE CARD -->
        <div class="content-card">
            <div class="table-header-bar">
                <h3>Reservation Records</h3>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Search customer or Ref ID...">
                </div>
            </div>

            <div class="table-scroll">
                <table id="bookingTable">
                    <thead>
                        <tr>
                            <th>Ref ID</th>
                            <th>Customer Name</th>
                            <th>Contact Info</th>
                            <th>Workshop Activity</th>
                            <th>Date & Time</th>
                            <th>Pax</th>
                            <th>Payment</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><strong style="color: var(--brand-red);"><?php echo htmlspecialchars($row['booking_ref']); ?></strong></td>
                                    <td>
                                        <strong><?php echo htmlspecialchars($row['full_name']); ?></strong><br>
                                        <small style="color: var(--text-muted);"><?php echo htmlspecialchars($row['email']); ?></small>
                                    </td>
                                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                    <td><strong><?php echo htmlspecialchars($row['activity_name']); ?></strong></td>
                                    <td>
                                        <?php echo date("d/m/Y", strtotime($row['booking_date'])); ?><br>
                                        <small style="color: var(--text-muted);"><?php echo htmlspecialchars($row['booking_time']); ?></small>
                                    </td>
                                    <td><strong><?php echo $row['pax_count']; ?></strong> pax</td>
                                    <td><span style="text-transform: uppercase; font-weight: 700; font-size: 11px; color: #555;"><?php echo htmlspecialchars($row['payment_method']); ?></span></td>
                                    <td><strong style="color: var(--brand-red-dark); font-size: 15px;">RM <?php echo number_format($row['total_amount'], 2); ?></strong></td>
                                    <td>
                                        <?php
                                        $statusClass = 'badge-pending';
                                        if ($row['status'] == 'Confirmed') $statusClass = 'badge-confirmed';
                                        if ($row['status'] == 'Cancelled') $statusClass = 'badge-cancelled';
                                        ?>
                                        <span class="badge <?php echo $statusClass; ?>"><?php echo $row['status']; ?></span>
                                    </td>
                                    <td>
                                        <form method="POST" style="display: flex; gap: 6px; align-items: center;">
                                            <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                                            <select name="status" class="select-status">
                                                <option value="Pending" <?php if ($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                                <option value="Confirmed" <?php if ($row['status'] == 'Confirmed') echo 'selected'; ?>>Confirmed</option>
                                                <option value="Cancelled" <?php if ($row['status'] == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
                                            </select>
                                            <button type="submit" name="update_status" class="btn-save">Save</button>
                                            <a href="admin-dashboard.php?delete_id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this booking record?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" style="text-align: center; color: var(--text-muted); padding: 40px 0;">
                                    <i class="fas fa-inbox" style="font-size: 32px; color: var(--brand-gold); margin-bottom: 10px; display: block;"></i>
                                    No reservation records found in the database.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- JAVASCRIPT SEARCH FILTER -->
    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("bookingTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                var refTd = tr[i].getElementsByTagName("td")[0];
                var nameTd = tr[i].getElementsByTagName("td")[1];
                if (refTd || nameTd) {
                    var refText = refTd.textContent || refTd.innerText;
                    var nameText = nameTd.textContent || nameTd.innerText;
                    if (refText.toUpperCase().indexOf(filter) > -1 || nameText.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>