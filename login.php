<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'pasa');

// Periksa metode POST untuk register
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($query)) {
        echo "Registrasi berhasil! <a href='login.php'>Login sekarang</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Periksa metode POST untuk login
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan informasi user ke session
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            // Redirect ke profile.php
            header('Location: profile.php');
            exit();
        } else {
            echo "<script>alert('Password salah!'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Email tidak terdaftar!'); window.location.href='login.php';</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <Style>
        /* LOGIN */

        .for-login {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin-top: 50px;
        }

        .wrapper {
            position: relative;
            width: 400px;
            height: 440px;
            background: #D3EAFF;
            border: 2px solid rgba(255, 255, 255, 5);
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, .5);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            transition: height 0.3s ease;
        }

        .wrapper.active {
            height: 520px;
        }


        .wrapper .form-box {
            width: 100%;
            padding: 40px;
        }

        .wrapper .form-box.login {
            transition: transform .18s ease;
            transform: translateX(0);
        }

        .wrapper.active .form-box.login {
            transition: none;
            transform: translateX(-400px);
        }

        .wrapper.active .form-box.register {
            transition: absolute;
            transition: none;
            transform: translateX(400px);
        }

        .wrapper.active .form-box.register {
            transition: transform .18s ease;
            transform: translateX(0);
        }

        .wrapper.active .register {
            display: block;
        }



        .wrapper .form-box.register {
            position: absolute;
            transform: translateX(400px);
        }

        .wrapper .icon-close {
            position: absolute;
            top: 0;
            right: 0;
            width: 45px;
            height: 45px;
            background: #162938;
            font-size: 2em;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom-left-radius: 20px;
            cursor: pointer;
            z-index: 1;
        }

        .form-box h2 {
            font-size: 2em;
            color: #000;
            text-align: center;
        }

        .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            border-bottom: 2px solid #162938;
            margin: 30px 0;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 1em;
            color: #162938;
            font-weight: 500;
            pointer-events: none;
            transition: .5s;
        }

        .input-box input:focus~label,
        .input-box input:valid~label {
            top: -5px;
        }


        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            color: #162938;
            font-weight: 600;
            padding: 0 35px 0 5px;
        }

        .input-box .icon {
            position: absolute;
            right: 8px;
            font-size: 1.2em;
            color: #162938;
            line-height: 57px;
        }




        .remember-forgot {
            font-size: .9em;
            color: #162938;
            font-weight: 500;
            margin: -15px 0 15px;
            display: flex;
            justify-content: space-between;
        }

        .remember-forgot label input {
            color: #162938;
            margin-right: 3px;
        }

        .remember-forgot a {
            color: #162938;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            height: 45px;
            background: #162938;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            color: #fff;
            font-weight: 500;
        }

        .login-register {
            font-size: .9em;
            color: #162938;
            text-align: center;
            font-weight: 500;
            margin: 25px 0 10px;
        }

        .login-register p a {
            color: #162938;
            text-decoration: none;
            font-weight: 600;
        }

        .login-register p a:hover {
            text-decoration: underline;
        }

        .btn a {
            color: #fff;
            /* Mengatur warna teks menjadi putih */
            text-decoration: none;
            /* Menghapus garis bawah pada link */
        }

        /* Previous CSS */
        .custom-alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: var(--white);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
            text-align: center;
            /* Align text to center*/
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .custom-alert.show {
            opacity: 1;
        }
    </Style>
</head>

<body>

    <header>
        <nav class="navbar">
            <a href="beranda.html" class="logo"><img src="./asset/logo_pasa.png" alt="Logo pasa"></a>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="cari_jasa.php">Cari Jasa</a></li>
                <li><a href="profile.php">Profile</a></li>
            </ul>
        </nav>

        <a href="login.php" class="btn_login">Login</a>
    </header>

    <content>
        <div class="for-login">
            <div class="wrapper">
                <span class="icon-close"><ion-icon name="close"></ion-icon></span>
                <div class="form-box login" action="login.php" method="POST">
                    <h2>Login</h2>
                    <form class="login-form" method="post" action="login.php">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email" id="email" name="email" required="">
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" id="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox">Remember me</label>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn" name="login"> Login </button>
                        <div class="login-register">
                            <p>Don't have an account?<a href="#" class="register-link">Register</a></p>
                        </div>
                    </form>
                </div>

                <div class="form-box register">
                    <h2>Registration</h2>
                    <form method="post" class="register-form" action="login.php">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="person"></ion-icon></span>
                            <input type="text" name="username" id="username" required>
                            <label>Username</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email" name="email" id="emailRegister" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="password" id="passwordRegister" required>
                            <label>Password</label>
                        </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox">I agree to the terms & conditions</label>

                        </div>
                        <button type="submit" class="btn" name="register">Register</button>
                        <div class="login-register">
                            <p>Already have an account?<a href="#" class="login-link">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </content>

    <footer class="footer">
        <div class="footer_content">
            <a href="tentang_pasa.php"><img src="./asset/logo_pasa.png" alt=""></a>
            <span>
                <p>PASA adalah situs mencari jasa dengan fitur gratis sewa jasa untuk pengguna baru</p>
            </span>
            <div class="icons">
                <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                <a href="#"><i class='bx bxl-linkedin'></i></a>
            </div>
        </div>
        <div class="footer_content">
            <h4>Penyedia Jasa</h4>
            <li><a href="#">Beriklan dengan kami</a></li>
            <li><a href="#">Buat CV</a></li>
        </div>
        <div class="footer_content">
            <h4>Penyedia Jasa</h4>
            <li><a href="#">Cari penyedia jasa</a></li>
            <li><a href="#">Layanan</a></li>
            <li><a href="#">Tips mencari jasa</a></li>
        </div>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        const wrapper = document.querySelector('.wrapper');
        const loginLink = document.querySelector('.login-link');
        const registerLink = document.querySelector('.register-link');

        if (wrapper && loginLink && registerLink) {
            registerLink.addEventListener('click', () => {
                wrapper.classList.add('active');
            });

            loginLink.addEventListener('click', () => {
                wrapper.classList.remove('active');
            });
        }
        async function loginForm(e) {
            e.preventDefault();
            const form = document.querySelector('.login-form');
            const formData = new FormData(form);
            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error: ${response.status}`);
                }
                const html = await response.text();
                if (html.includes("Login successful")) {
                    window.location.href = "profile.html";
                } else {
                    document.body.insertAdjacentHTML("beforeend", html);
                }
            } catch (error) {
                console.error("Failed to Login", error);
                showCustomAlert(`Failed to login : ${error.message}`);
            }
        }
        async function registerForm(e) {
            e.preventDefault();
            const form = document.querySelector('.register-form');
            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.text();
                if (result.includes("Registration successful")) {
                    alert("Registration successful. Redirecting to login...");
                    window.location.href = 'login.php';
                } else {
                    alert(result);
                }
            } catch (error) {
                alert(`Failed to register: ${error.message}`);
            }
        }
    </script>
</body>

</html>