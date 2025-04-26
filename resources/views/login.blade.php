<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Human Capital Service</title>
    <style>
        /* Import Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Body Style */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ff5d5d, #9f1111);
        }

        /* Container */
        .container {
            display: flex;
            width: 90%;
            max-width: 1000px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        /* Illustration */
        .illustration {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f4f5ff;
        }

        .illustration img {
            width: 80%;
            max-width: 400px;
        }

        /* Login Form */
        .login-form {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form h1 {
            font-size: 26px;
            font-weight: 600;
            color: #333;
        }

        .login-form p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        /* Input Fields */
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group label {
            font-size: 14px;
            color: #333;
            font-weight: 500;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 2px solid #ddd;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            transition: border 0.3s ease;
        }

        .input-group input:focus {
            border-color: #6c63ff;
        }

        .input-group .invalid-feedback {
            color: red;
            font-size: 12px;
            display: none;
        }

        /* Button */
        .btn {
            width: 100%;
            padding: 12px;
            background: #9f1111;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #65a434;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .illustration {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Ilustrasi -->
        <div class="illustration">
            <img src="https://www.len.co.id/wp-content/uploads/2023/07/Indhan-1-Len.png" alt="Illustration">
        </div>

        <!-- Form Login -->
        <div class="login-form">
            <h1>Selamat Datang Kembali!👋</h1>
            <p>Masuk untuk melanjutkan ke dasbor Anda.</p>

            <form action="/actionLogin" method="POST" id="loginForm">
                @csrf
                <div class="input-group">
                    <label for="email">Email   </label>
                    <input type="text" id="email" name="email" placeholder="Masukkan email atau nama pengguna Anda">
                    <div class="invalid-feedback">*Silakan masukkan email atau nama pengguna yang valid.</div>
                </div>

                <div class="input-group">
                    <label for="password">Kata sandi</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan kata sandi Anda">
                    <div class="invalid-feedback">*Kata sandi tidak boleh kosong.</div>
                </div>

                <button type="submit" class="btn">Masuk</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            let email = document.getElementById("email");
            let password = document.getElementById("password");
            let isValid = true;

            // Reset error styles
            document.querySelectorAll('.invalid-feedback').forEach(el => el.style.display = 'none');
            email.style.borderColor = "#ddd";
            password.style.borderColor = "#ddd";

            // Validasi email
            if (email.value.trim() === "") {
                email.nextElementSibling.style.display = "block";
                email.style.borderColor = "red";
                isValid = false;
            }

            // Validasi password
            if (password.value.trim() === "") {
                password.nextElementSibling.style.display = "block";
                password.style.borderColor = "red";
                isValid = false;
            }

            // Cegah submit jika ada error
            if (!isValid) event.preventDefault();
        });
    </script>
</body>
</html>

