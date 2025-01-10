<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Ambil data dari sesi
$username = htmlspecialchars($_SESSION['username']);
$email = htmlspecialchars($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil - <?php echo $username; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Gaya Dasar */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            color: #333;
        }

        .profile-container {
            width: 80%;
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 100px;
        }

        /* Header Profil */
        .profile-section {
            background-image: url('../asset/bg.gif');
            background-size: cover;
            background-position: center;
            padding: 60px 20px 30px 20px;
            text-align: center;
            color: white;
            position: relative;
        }

        .profile-pic-container {
            position: relative;
            display: inline-block;
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            object-fit: cover;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .profile-section .edit-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: white;
            color: #4a90e2;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .profile-section .edit-btn:hover {
            transform: scale(1.1);
        }

        .edit-profile-pic-btn {
            position: absolute;
            bottom: 0px;
            right: 0px;
            background: white;
            color: #4a90e2;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .edit-profile-pic-btn:hover {
            transform: scale(1.1);
        }

        /* Informasi Profil */
        .profile-info {
            text-align: center;
            padding: 20px 0;
        }

        .profile-info h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: 600;
        }

        .profile-info p {
            margin: 5px 0;
            color: #666;
            font-size: 1rem;
        }

        .profile-info .location {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            color: #888;
        }

        /* Tombol Profil */
        .profile-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }

        .profile-buttons button {
            padding: 12px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            background: #4a90e2;
            color: white;
            font-size: 0.9rem;
            font-weight: 500;
            transition: background 0.3s, transform 0.2s;
        }

        .profile-buttons button:hover {
            background: #357abd;
            transform: translateY(-2px);
        }

        #experienceInput {
            width: 96%;
            height: 100px;
            margin-top: 10px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }

        #skillInput {
            width: 96%;
            height: 100px;
            margin-top: 10px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }

        /* Bagian Rekomendasi */
        .recommended-section {
            padding: 25px;
            background-color: #f8f9fa;
            border-radius: 0 0 15px 15px;
        }

        .recommended-section h2 {
            margin: 0 0 20px 0;
            font-size: 1.4rem;
            font-weight: 600;
            color: #444;
        }

        .recommended-item {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .recommended-item p {
            margin: 5px 0;
            color: #555;
        }

        .recommended-item button {
            margin-top: 5px;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .recommended-item button:hover {
            background: #357abd;
            transform: translateY(-1px);
        }

        /* Analitik */
        .analytics {
            display: flex;
            justify-content: space-between;
            padding: 25px;
            border-top: 1px solid #e0e0e0;
            background: #f9f9f9;
        }

        .analytics-item {
            flex: 1;
            text-align: center;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            margin: 0 5px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .analytics-item p {
            margin: 5px 0;
            color: #555;
        }
    </style>

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


    <div class="profile-container">
        <div class="profile-section">
            <div class="profile-pic-container">
                <img class="profile-pic" id="profilePic" src="../asset/mada.jpg" alt="Foto Profil">
                <button class="edit-profile-pic-btn" id="editProfilePicButton"><i
                        class="fas fa-pencil-alt"></i></button>
            </div>
            <button class="edit-btn" id="editBackgroundButton"><i class="fas fa-pencil-alt"></i></button>
            <input type="file" id="backgroundInput" style="display: none;" accept="image/*">
            <input type="file" id="fileInput" style="display: none;" accept="image/*">
        </div>
        <div class="profile-info">
            <h1><?php echo $username; ?></h1>
            <p class="location"><i class="fas fa-map-marker-alt"></i> Lokasi belum diatur</p>
            <p><?php echo $email; ?></p>
        </div>
        <div class="profile-buttons">
            <button>Tambahkan Bagian Profil</button>
            <button>Optimalkan Profil Anda</button>
        </div>
        <div class="recommended-section">
            <h2>Disarankan untuk Anda</h2>
            <div class="recommended-item">
                <p><strong>Pengalaman</strong></p>
                <textarea id="experienceInput"
                    placeholder="Tulis pengalaman Anda untuk mendapatkan lebih banyak kunjungan profil."></textarea>
                <button id="saveExperienceButton">Tambahkan Pengalaman</button>
            </div>
            <div class="recommended-item">
                <p><strong>Keahlian</strong></p>
                <textarea id="skillInput" placeholder="Tulis keahlian Anda untuk menemukan peluang baru."></textarea>
                <button id="saveSkillButton">Tambahkan Keahlian</button>
            </div>
        </div>
        <div class="analytics">
            <div class="analytics-item">
                <p>0 kunjungan profil</p>
                <p>Perbarui profil Anda untuk menarik perhatian Rekruiter</p>
            </div>
            <div class="analytics-item">
                <p>0 kunjungan profil</p>
                <p>Buat posting untuk meningkatkan interaksi</p>
            </div>
        </div>
    </div>



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

    <script>
        // JavaScript untuk mengganti gambar profil
        document.getElementById('editProfilePicButton').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePic').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        // JavaScript untuk mengganti gambar background
        document.getElementById('editBackgroundButton').addEventListener('click', function() {
            document.getElementById('backgroundInput').click();
        });

        document.getElementById('backgroundInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.profile-section').style.backgroundImage = `url(${e.target.result})`;
                }
                reader.readAsDataURL(file);
            }
        });

        // JavaScript untuk menyimpan pengalaman
        document.getElementById('saveExperienceButton').addEventListener('click', function() {
            var textarea = document.getElementById('experienceInput');
            var experienceText = textarea.value; // Ambil teks dari textarea

            if (experienceText.trim() === "") {
                alert("Silakan tulis pengalaman Anda terlebih dahulu!");
            } else {
                alert("Pengalaman berhasil disimpan: " + experienceText);
                // logika untuk menyimpan data ke server atau database
            }
        });

        // JavaScript untuk menyimpan keahlian
        document.getElementById('saveSkillButton').addEventListener('click', function() {
            var textarea = document.getElementById('skillInput');
            var skillText = textarea.value; // Ambil teks dari textarea

            if (skillText.trim() === "") {
                alert("Silakan tulis Keahlian Anda terlebih dahulu!");
            } else {
                alert("Keahlian berhasil disimpan: " + skillText);
                // logika untuk menyimpan data ke server atau database
            }
        });
    </script>
</body>

</html>