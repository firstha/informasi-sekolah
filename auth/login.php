<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Delius&family=Moirai+One&display=swap" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 900px;
            max-width: 100%;
            display: flex;
        }
        .login-left {
            background: #B2C8B2;
            color: black;
            padding: 40px;
            width: 65%;
        }
        .login-right {
            padding: 40px;
            width: 35%;
            background: #ffffff;
        }
        .login-right h2 {
            margin-bottom: 30px;
        }
        .login-left h1 {
            text-align: center;
            font-size: 48px;
            font-family: "Delius", cursive;
            color: #4A7C59;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-left d-flex flex-column justify-content-center">
            <h1>Sistem Informasi Sekolah</h1>
            <p class="mt-3">Silakan login untuk mendapatkan akses.. Pastikan data login yang Anda masukkan benar.</p>
        </div>
        <div class="login-right">
            <h2>Login</h2>
            <form action="proses_login.php" method="POST">
                <div class="form-group mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100"><b>Login</b></button>
            </form>
        </div>
    </div>
</body>
</html>
