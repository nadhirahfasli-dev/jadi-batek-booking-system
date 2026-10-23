<?php
date_default_timezone_set('Asia/Kuala_Lumpur');

$host     = "sql306.infinityfree.com"; // MySQL Hostname
$username = "if0_43252964";          // MySQL Username
$password = "Gmi202699100";   // MySQL Password
$dbname   = "if0_43252964_jadibatek_db"; // Database Name

// Matikan laporan skrin secara automatik untuk mengelakkan Fatal Error paparan putih
mysqli_report(MYSQLI_REPORT_OFF);

// Gunakan simbol @ di hadapan mysqli_connect
$conn = @mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("
    <div style='font-family: Arial, sans-serif; padding: 30px; max-width: 500px; margin: 50px auto; background: #fff3cd; color: #856404; border: 1px solid #ffeeba; border-radius: 12px; text-align: center; box-shadow: 0 4px 12px rgba(0,0,0,0.05);'>
        <h2 style='margin-top:0;'>Gagal Disambung ke Database</h2>
        <p>Sila buka <strong>XAMPP Control Panel</strong> dan tekan butang <strong>Start</strong> pada modul <strong>MySQL</strong>.</p>
    </div>
    ");
}
