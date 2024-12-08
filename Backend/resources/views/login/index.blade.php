<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SD Negeri Tembalang</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .login-container {
            display: flex;
            width: 100%;
            max-width: 1000px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            height: 400px; /* Tambahkan tinggi untuk menambah ruang */
        }
        .login-image {
            flex: 1;
            background: url('{{ asset("images/login.jpeg") }}') no-repeat center center;
            background-size: cover;
            min-height: 60%; /* Pastikan background mengisi seluruh area */
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .login-image h1 {
            font-size: 2em;
            margin: 0;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }
        .login-image img {
            max-width: 80px;
            margin-top: 20px;
        }
        .login-form {
            flex: 1;
            background: #cec6c6;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .login-form h2 {
            margin-bottom: 20px;
            color: #080808;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .login-form button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-form .register-btn {
            background: #28a745;
            margin-top: 10px;
        }
        .login-form a {
            text-decoration: none;
            color: #007bff;
            margin-top: 10px;
        }
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <!-- Bagian Gambar Latar Belakang -->
        <div class="login-image">     
            <h1>SEKOLAH DASAR NEGERI TEMBALANG</h1>    
        </div>
        <!-- Form Login -->
        <div class="login-form">
            <h2>Login</h2>
            <form method="POST" action="/login">
                @csrf
                <input type="text" name="login" placeholder="Email or Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" >Log In</button>
            </form>
        </div>
    </div>
</body>
</html>
