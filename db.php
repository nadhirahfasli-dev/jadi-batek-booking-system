<?php
date_default_timezone_set('Asia/Kuala_Lumpur');

// Semak sama ada fail dijalankan di Localhost atau di Server InfinityFree
if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
    // -----------------------------------------------------------------
    // 1. TETAPAN UNTUK LOCALHOST (XAMPP Komputer Anda)
    // -----------------------------------------------------------------
    $host     = "localhost";
    $username = "root";
    $password = ""; // Kosongkan dalam XAMPP
    $dbname   = "jadibatek_db"; // Nama database tempatan anda
} else {
    // -----------------------------------------------------------------
    // 2. TETAPAN UNTUK SERVER INFINITYFREE (Apabila sudah Upload)
    // -----------------------------------------------------------------
    $host     = "sql306.infinityfree.com";
    $username = "if0_43252964";
    $password = "Gmi202699100";
    $dbname   = "if0_43252964_jadibatek_db";
}

mysqli_report(MYSQLI_REPORT_OFF);

$conn = @mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("
    <div style='font-family: Arial, sans-serif; padding: 30px; max-width: 500px; margin: 50px auto; background: #fff3cd; border-radius: 8px; text-align: center;'>
        <h2 style='margin-top:0; color: #856404;'>Gagal Disambung ke Database</h2>
        <p style='color: #856404;'>Sila pastikan MySQL di XAMPP telah di-Start (untuk localhost) atau fail telah di-upload ke InfinityFree.</p>
    </div>
    ");
}
