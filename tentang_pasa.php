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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PASA Platform Skill dan Jasa</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="script.js">
  <style>
    /* Tentang pasa */

    .tentang-kami {
      padding: 80px 20px;
      max-width: 1200px;
      margin: 0 auto;
      position: relative;
      text-align: center;
      overflow: hidden;
    }

    /* Parallax Background Effect */
    .tentang-kami::before {
      content: '';
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, #283e51, #4b79a1, #7b4397);
      background-size: cover;
      z-index: -1;
      animation: parallax 20s linear infinite;
    }

    @keyframes parallax {
      0% {
        transform: translate(-50%, 0);
      }

      50% {
        transform: translate(-50%, -10%);
      }

      100% {
        transform: translate(-50%, 0);
      }
    }

    /* Section Headers with Sliding Animation */
    .tentang-kami h1,
    .tentang-kami h2 {
      color: #0400ff;
      font-size: 2.8em;
      margin-bottom: 20px;
      position: relative;
      opacity: 0;
      animation: slideInDown 1.2s forwards ease;
    }

    /* Sliding Text Effect */
    @keyframes slideInDown {
      0% {
        opacity: 0;
        transform: translateY(-30px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Content Blocks with Different Slide-in Animations */
    .isi-tentang-kami,
    .visi,
    .misi,
    .nilai,
    .tim {
      background: rgba(255, 255, 255, 0.9);
      padding: 40px;
      margin: 20px 0;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      opacity: 0;
      transform: translateX(-30px);
      animation: slideInLeft 1.2s forwards ease;
      transition: transform 0.6s ease, opacity 0.6s ease;
    }

    @keyframes slideInLeft {
      0% {
        opacity: 0;
        transform: translateX(-50px);
      }

      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }

    /* Hover Effects for Card Elements */
    .kartu-nilai {
      display: flex;
      justify-content: space-around;
      gap: 20px;
      flex-wrap: wrap;
      margin-top: 20px;
    }

    .kartu {
      flex: 1 1 calc(30% - 20px);
      background: #4b79a1;
      color: #fff;
      padding: 20px;
      border-radius: 12px;
      position: relative;
      overflow: hidden;
      text-align: center;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      animation: scaleUp 1.3s forwards ease;
    }

    .kartu:hover {
      transform: scale(1.08);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
    }

    .kartu h3 {
      font-size: 1.6em;
      margin-bottom: 10px;
      z-index: 1;
    }

    /* Team Member Hover Effect with Zoom */
    .member-tim {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 30px;
    }

    .member {
      text-align: center;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      opacity: 0;
      animation: fadeInUp 1.5s forwards ease;
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(30px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .member img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      transition: transform 0.4s ease;
    }

    .member:hover img {
      transform: scale(1.1);
    }

    .member h3 {
      font-size: 1.3em;
      color: #333;
      margin-top: 15px;
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
        <li><a href="Profile.php">Profile</a></li>
      </ul>
    </nav>

    <a href="login.php" class="btn_login">Login</a>
  </header>

  <section class="tentang-kami">
    <div class="isi-tentang-kami">
      <h1>TENTANG KAMI</h1>
      <p>Pasa adalah platform terbaik untuk berbagai keahlian dan jasa yang membantu Anda mencapai tujuan, dengan
        menghubungkan Anda dengan para profesional berkualitas yang siap mendukung perkembangan keterampilan dan layanan
        yang Anda butuhkan untuk mewujudkan impian Anda secara efisien.</p>
    </div>

    <div class="visi">
      <h2>VISI</h2>
      <p>Visi kami adalah Menjadi platform terkemuka yang memfasilitasi peningkatan skill dan jasa berkualitas,
        mendukung pengguna dalam mencapai potensi penuh mereka melalui akses layanan inovatif dan gratis bagi pengguna
        baru. Kami bertujuan untuk menciptakan ruang kolaboratif yang memperkaya keterampilan serta membuka peluang
        lebih luas bagi semua.</p>
    </div>

    <!-- Mission Section -->
    <div class="misi">
      <h2>MISI</h2>
      <p>Misi kami adalah untuk menyediakan akses mudah dan terjangkau bagi setiap individu untuk mengembangkan
        keterampilan mereka dan menemukan layanan berkualitas, serta menciptakan komunitas yang saling mendukung dalam
        mencapai tujuan karir dan pribadi.</p>
    </div>

    <div class="nilai">
      <h2>NILAI KAMI</h2>
      <div class="kartu-nilai">
        <div class="kartu">
          <h3>Inovasi</h3>
          <p>Kami selalu berinovasi untuk pengguna kami, menciptakan lingkungan yang mendukung perkembangan dan
            keterampilan yang mereka butuhkan untuk mencapai tujuan mereka.</p>
        </div>
        <div class="kartu">
          <h3>Integritas</h3>
          <p>Kepercayaan pengguna adalah prioritas utama kami, karena kami percaya bahwa hubungan yang kuat dengan
            pengguna akan menciptakan pengalaman yang lebih baik.</p>
        </div>
        <div class="kartu">
          <h3>Komunitas</h3>
          <p>Kami menyediakan platform yang dirancang untuk membantu setiap orang berkembang bersama, berbagi
            keterampilan, dan mencapai kesuksesan kolektif.</p>
        </div>
      </div>
    </div>

    <div class="tim">
      <h2>TIM KAMI</h2>
      <div class="member-tim">
        <div class="member"><img src="../PASAUAS/asset/zaidan.jpg" alt="Team Member 1">
          <h3>Zaidan</h3>
        </div>
        <div class="member"><img src="../PASAUAS/asset/mada.jpg" alt="Team Member 2">
          <h3>Mada</h3>
        </div>
        <div class="member"><img src="../PASAUAS/asset/ardli.jpg" alt="Team Member 3">
          <h3>Ardli</h3>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="footer_content">
      <a href=""><img src="../PASAUAS/asset/logo_pasa.png" alt=""></a>
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

</body>

</html>