<?php
include('assets/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hash password untuk keamanan

    // Cek apakah username sudah ada
    $check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "Username atau Email sudah digunakan.";
    } else {
        // Masukkan data pengguna baru ke database
        $insert_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $insert_query)) {
            echo "Pendaftaran berhasil! <a href='index.php'>Login Sekarang</a>";
        } else {
            echo "Terjadi kesalahan saat mendaftar.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('wallpaperlogin.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-section {
            background: rgba(255, 255, 255, 0.85);
            padding: 50px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            width: 450px;
        }
        .description-section {
            color: #ffffff;
            padding: 30px;
        }
        .login-section h2 {
            margin-bottom: 30px;
            text-align: center;
            font-weight: 600;
            font-size: 1.8rem;
            color: #333;
        }
        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            font-weight: 500;
        }
        .form-control {
            margin-bottom: 20px;
            height: 50px;
            font-size: 1rem;
        }
        .description-section h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .description-section p {
            font-size: 1.2rem;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row w-100">
            <!-- Sign Up Section -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="login-section">
                    <h2>Sign Up</h2>
                    <form method="POST" action="signup.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                    <p class="mt-3">Already have an account? <a href="index.php">Login</a></p>
                </div>
            </div>
            <!-- Description Section -->
            <div class="col-md-6 d-flex align-items-center">
                <div class="description-section">
                    <h1>Welcome to Risk Management App</h1>
                    <p>
                        Aplikasi ini dirancang untuk mempermudah pengelolaan risiko berdasarkan data yang ada di file Excel Anda.
                        Dengan fitur seperti identifikasi risiko, analisis, peta risiko, dan monitoring, Anda dapat memonitor dan 
                        mengelola risiko secara lebih efisien.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
