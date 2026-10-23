<?php
header('Content-Type: application/json');

// Sambungan ke Database
$host     = "localhost";
$username = "root";
$password = "";
$dbname   = "jadibatek_db";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    echo json_encode(['status' => 'error', 'message' => 'Gagal disambung ke database']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName      = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email         = mysqli_real_escape_string($conn, $_POST['email']);
    $phone         = mysqli_real_escape_string($conn, $_POST['phone']);
    $activityName  = mysqli_real_escape_string($conn, $_POST['activity_name']);
    $bookingDate   = mysqli_real_escape_string($conn, $_POST['booking_date']);
    $bookingTime   = mysqli_real_escape_string($conn, $_POST['booking_time']);
    $paxCount      = (int) $_POST['pax_count'];
    $paymentMethod = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $totalAmount   = (float) $_POST['total_amount'];

    // Cipta ID Rujukan Tempahan Unik (Contoh: JB-20261023-A1B2)
    $bookingRef    = "JB-" . date("Ymd") . "-" . strtoupper(substr(md5(uniqid(rand(), true)), 0, 4));

    $query = "INSERT INTO bookings (booking_ref, full_name, email, phone, activity_name, booking_date, booking_time, pax_count, payment_method, total_amount, status) 
              VALUES ('$bookingRef', '$fullName', '$email', '$phone', '$activityName', '$bookingDate', '$bookingTime', '$paxCount', '$paymentMethod', '$totalAmount', 'Pending')";

    if (mysqli_query($conn, $query)) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Tempahan berjaya disimpan!',
            'booking_ref' => $bookingRef
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Ralat database: ' . mysqli_error($conn)
        ]);
    }
}
?>