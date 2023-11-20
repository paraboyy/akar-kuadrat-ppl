<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        h1 {
            text-align: center;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin: auto auto;
            max-width: 400px;
            display: flex; /* Menggunakan flexbox */
            align-items: center; /* Pusatkan vertikal */
            flex-wrap: wrap;
        }
        .container label, .container input {
            display: block; /* Mengatur elemen <label> dan <input> agar tampil sebagai blok */
            margin: 5px 0;
        }
        .container button {
            margin-top: 10px; /* Tambahkan margin atas agar tombol tidak terlalu rapat dengan input */
        }
    </style>
</head>
<body>
    <h1>LOGIN GES</h1>
    <div class="container">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <label for="inputUsername">Username:</label>
            <input type="text" id="inputUsername" name="name" placeholder="Masukkan username" required>

            <label for="inputPassword">Password:</label>
            <input type="password" id="inputPassword" name="password" placeholder="Masukkan password" required>

            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
