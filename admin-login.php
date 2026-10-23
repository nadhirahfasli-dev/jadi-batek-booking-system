<?php
session_start();

// Kata laluan admin (Boleh ditukar mengikut kehendak anda)
$ADMIN_PASSWORD = "admin123";

$error = "";

if (isset($_POST['login'])) {
    $input_pass = $_POST['password'];

    if ($input_pass === $ADMIN_PASSWORD) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin-dashboard.php");
        exit();
    } else {
        $error = "Invalid password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Portal Access | Jadi Batek</title>

    <!-- Google Fonts & FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-red: #d93843;
            --brand-red-dark: #a8222b;
            --brand-gold: #c59a45;
            --text-dark: #2b1819;
            --text-muted: #7a6869;
            --border-color: #ede4d8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            /* LATAR BELAKANG IMAGE6.JPG SAMA SEPERTI DASHBOARD */
            background: linear-gradient(135deg, rgba(250, 247, 242, 0.82) 0%, rgba(245, 238, 228, 0.88) 100%),
                url('batik.jpg') center/cover no-repeat fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(12px);
            padding: 45px 40px;
            border-radius: 24px;
            border: 1px solid var(--border-color);
            box-shadow: 0 15px 35px rgba(43, 24, 25, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative;
        }

        .login-logo {
            max-width: 150px;
            height: auto;
            margin-bottom: 20px;
        }

        .login-card h2 {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--brand-red-dark);
            margin-bottom: 6px;
        }

        .login-card p.subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 28px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--brand-gold);
            font-size: 14px;
        }

        .input-group input[type="password"] {
            width: 100%;
            padding: 13px 16px 13px 44px;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            font-size: 13.5px;
            outline: none;
            background: #ffffff;
            transition: 0.3s ease;
        }

        .input-group input[type="password"]:focus {
            border-color: var(--brand-red);
            box-shadow: 0 0 0 3px rgba(217, 56, 67, 0.12);
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, var(--brand-red) 0%, var(--brand-red-dark) 100%);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 6px 18px rgba(217, 56, 67, 0.25);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(217, 56, 67, 0.35);
        }

        .error-message {
            background: #fdeded;
            color: var(--brand-red);
            border: 1px solid rgba(217, 56, 67, 0.3);
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 12.5px;
            font-weight: 500;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .back-link {
            margin-top: 25px;
            display: inline-block;
        }

        .back-link a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 12.5px;
            font-weight: 500;
            transition: 0.2s;
        }

        .back-link a:hover {
            color: var(--brand-red);
        }
    </style>
</head>

<body>

    <div class="login-card">
        <!-- LOGO RASMI JADI BATEK -->
        <img src="logo.png" alt="Jadi Batek Logo" class="login-logo">

        <h2>Staff Portal Access</h2>
        <p class="subtitle">Please enter your admin password to continue</p>

        <?php if ($error): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter admin password" required autofocus>
            </div>

            <button type="submit" name="login" class="btn-login">
                <span>Login to Dashboard</span>
                <i class="fas fa-arrow-right" style="font-size: 12px;"></i>
            </button>
        </form>

        <div class="back-link">
            <a href="index.php"><i class="fas fa-arrow-left"></i> Back to Main Website</a>
        </div>
    </div>

</body>

</html>