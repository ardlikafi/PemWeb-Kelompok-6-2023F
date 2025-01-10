
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        /* Mengimpor font "Albert Sans" dan "Poppins" dari Google Fonts*/

        * {
            margin: 0px;
            /* Menghapus margin default untuk semua elemen */
            padding: 0px;
            /* Menghapus padding default untuk semua elemen */
            box-sizing: border-box;
            /* Memastikan padding dan border dihitung dalam ukuran elemen, bukan ditambahkan ke lebar/tinggi elemen */
            font-family: "Poppins", serif;
            /* Mengatur font default semua elemen ke "Poppins" */
        }

        /* CONTENT HOME */

        .home_content1 {
            margin-top: 70px;
            position: relative;
        }

        .home_content1 img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Penyesuaian teks agar tetap berada di dalam gambar */
        .home_content1_text {
            position: absolute;
            /* Posisi absolut relatif ke kontainer */
            top: 50%;
            /* Menempatkan teks di tengah secara vertikal */
            left: 50%;
            /* Menempatkan teks di tengah secara horizontal */
            transform: translate(-50%, -50%);
            /* Menggeser teks agar berada tepat di tengah */
            color: #fff;
            /* Warna teks putih */
            font-size: 30px;
            /* Ukuran font default */
            font-weight: 600;
            text-align: center;
            /* Rata tengah teks */
            letter-spacing: 3px;
            /* Jarak antar huruf */
            width: 80%;
            /* Batas lebar teks agar tidak keluar gambar */
            padding: 10px;
            /* Ruang tambahan di dalam teks */
            animation: slideInFromRighttext 0.6s ease-out;
            /* Durasi 0.6 detik dengan transisi halus */
        }


        /* Media Queries untuk layar kecil */
        @media (max-width: 768px) {
            .home_content1_text {
                font-size: 20px;
                /* Ukuran font lebih kecil untuk layar kecil */
                width: 90%;
                /* Mempersempit teks agar tetap berada di dalam gambar */
                padding: 8px;
                /* Ruang tambahan lebih kecil */
            }
        }

        @media (max-width: 480px) {
            .home_content1_text {
                font-size: 16px;
                /* Ukuran font lebih kecil untuk ponsel */
                letter-spacing: 0.5px;
                /* Mengurangi jarak antar huruf */
            }
        }

        .home_content2 {
            margin: 150px auto;
            max-width: 100%;
            height: max-content;

        }

        .home_content2 p {
            font-family: "Poppins", serif;
            /* Mengatur font default semua elemen ke "Poppins" */
            text-align: center;
            font-size: 35px;
            font-weight: 450;
        }

        .home_content2_button {
            display: flex;
            margin: 20px auto;
            max-width: 70%;
            height: auto;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        /* Styling untuk tombol login */
        .btn_content2 {
            width: 160px;
            /* Setiap tombol memiliki lebar sekitar 23% dari container */
            height: 45px;
            line-height: 45px;
            text-align: center;
            font-family: "Albert Sans", serif;
            /* Menggunakan font "Albert Sans" */
            text-decoration: none;
            /* Menghapus garis bawah */
            color: #000;
            /* Warna teks hitam */
            font-size: 15px;
            /* Ukuran font 18px */
            font-weight: 400;
            /* Ketebalan font normal */
            background-color: #D3EAFF;
            /* Warna latar belakang biru */
            margin: 20px 40px;
            border-radius: 10%;
            /* Membuat sudut tombol melengkung */
            box-sizing: border-box;
            /* Memastikan padding tidak mempengaruhi lebar tombol */
            box-shadow: 1px 1px 7px 0px #76CCFF;
            opacity: 0;
            /* Transparan */
            transform: translateY(20px);
            /* Berada sedikit di bawah */
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
            /* Transisi halus */
        }

        /* Media Query untuk tablet */
        @media (max-width: 768px) {
            .btn_content2 {
                margin: 10px 5px;
                width: 45%;
                /* Tombol akan mengisi sekitar 45% dari kontainer */
                font-size: 14px;
                /* Ukuran font lebih kecil */
            }
        }

        /* Media Query untuk ponsel */
        @media (max-width: 480px) {
            .btn_content2 {
                margin: 10px 5px;
                width: 40%;
                /* Tombol akan mengisi sekitar 40% dari kontainer */
                font-size: 12px;
                /* Ukuran font lebih kecil */
            }
        }

        /* Efek muncul dari bawah ke atas */
        @keyframes fadeInUp {
            from {
                transform: translateY(20px);
                /* Awalnya berada di bawah */
                opacity: 0;
                /* Transparan */
            }

            to {
                transform: translateY(0);
                /* Kembali ke posisi awal */
                opacity: 1;
                /* Sepenuhnya terlihat */
            }
        }


        /* Tombol saat terlihat */
        .btn_content2.visible {
            animation: fadeInUp 0.6s ease-out;
            /* Jalankan animasi */
            opacity: 1;
            /* Sepenuhnya terlihat */
            transform: translateY(0);
            /* Posisi awal */
        }


        .home_content3 {
            margin: 150px auto;
            display: flex;
            max-width: 80%;
            text-align: center;
        }

        .home_content3 img {
            width: 550px;
            height: auto;
        }

        .home_content3_text {
            margin: auto 50px;
            margin-right: 80px;
            font-family: "Poppins", serif;
        }

        .home_content3_text h4 {
            text-align: justify;
            margin-bottom: 30px;
            font-size: 20px;
            font-weight: 600;
        }

        .home_content3_text p {
            text-align: justify;
            font-size: 15px;
            font-weight: 500;
        }

        .home_content4 {
            margin: 130px auto;
            display: flex;
            max-width: 80%;
            text-align: center;
        }

        .home_content4 img {
            width: 550px;
            height: auto;
        }

        .home_content4_text {
            margin: auto 50px;
            margin-left: 80px;
            font-family: "Poppins", serif;
        }

        .home_content4_text h4 {
            text-align: justify;
            margin-bottom: 30px;
            font-size: 20px;
            font-weight: 600;
        }

        .home_content4_text p {
            text-align: justify;
            font-size: 15px;
            font-weight: 500;
        }

        @media (max-width: 768px) {

            .home_content3,
            .home_content4 {
                flex-direction: column;
                /* Mengubah layout menjadi vertikal */
                text-align: center;
                /* Teks rata tengah */
            }

            .home_content3 img,
            .home_content4 img {
                margin: auto;
                width: 450px;
                margin-bottom: 30px;
                /* Memberi jarak antara gambar dan teks */
            }

            .home_content3_text,
            .home_content4_text {
                margin: 0 auto;
                /* Membuat teks berada di tengah */
                text-align: center;
                /* Teks rata tengah */
            }
        }


        /* Animasi dari kanan ke kiri */
        @keyframes fadeInFromRight {
            from {
                transform: translateX(50px);
                /* Mulai dari posisi 50px di kanan */
                opacity: 0;
                /* Transparan */
            }

            to {
                transform: translateX(0);
                /* Kembali ke posisi normal */
                opacity: 1;
                /* Sepenuhnya terlihat */
            }
        }

        /* Animasi dari kiri ke kanan */
        @keyframes fadeInFromLeft {
            from {
                transform: translateX(-50px);
                /* Mulai dari posisi 50px di kiri */
                opacity: 0;
                /* Transparan */
            }

            to {
                transform: translateX(0);
                /* Kembali ke posisi normal */
                opacity: 1;
                /* Sepenuhnya terlihat */
            }
        }

        /* Status default sebelum animasi */
        .animate_content34 {
            opacity: 0;
            transform: translateX(50px);
            /* Default untuk animasi dari kanan */
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        /* Status aktif untuk elemen yang muncul dari kanan ke kiri */
        .animate_content34.from-right.show {
            animation: fadeInFromRight 0.5s ease-out;
            opacity: 1;
            transform: translateX(0);
        }

        /* Status aktif untuk elemen yang muncul dari kiri ke kanan */
        .animate_content34.from-left.show {
            animation: fadeInFromLeft 0.5s ease-out;
            opacity: 1;
            transform: translateX(0);
        }

        .testimonial-section {
            max-width: 1200px;
            margin: 50px auto;
            text-align: center;
        }

        .testimonial-header h2 {
            font-size: 2rem;
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .testimonial-header p {
            font-size: 1.2rem;
            color: #666;
        }

        .testimonial{
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .testimonial-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .testimonial-card {
            background-color: #ffffff;
            width: 250px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 15px;
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.5s ease;
        }

        .testimonial-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .testimonial-card h3 {
            font-size: 1rem;
            color: #333;
            margin-bottom: 5px;
        }

        .testimonial-card p {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 10px;
            max-height: 110px; /* Set maximum height */
            overflow: hidden; /* Hide overflow */
            text-overflow: ellipsis; /* Add ellipsis (...) */
            display: -webkit-box; /* Use for multiline truncation */
            -webkit-line-clamp: 5; /* Limit to 3 lines */
            -webkit-box-orient: vertical; /* Vertical orientation */
        }

        .testimonial-card.active {
            opacity: 1;
            transform: translateY(0);
        }

        .articles-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 50px;
            justify-content: space-between;
        }
        .article {
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            opacity: 0;
            transform: translateY(50px);
            flex: 0 1 calc(33.333% - 20px);
            box-sizing: border-box;
        }
        .article:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }
        .article img {
            width: 100%;
            height: auto;
        }
        .article-content {
            padding: 20px;
        }
        .article-content h3 {
            margin: 0 0 10px;
            font-size: 1.2rem;
        }
        .article-content p {
            color: #555;
            font-size: 0.9rem;
        }
        .article-content span {
            display: block;
            margin-top: 10px;
            font-size: 0.8rem;
            color: #888;
        }
        @media (max-width: 768px) {
            .article {
                flex: 0 1 calc(50% - 20px);
            }
        }
        @media (max-width: 480px) {
            .article {
                flex: 0 1 100%;
            }
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

    <content>

        <div class="home_content1">
            <img src="./asset/home_content1.png" alt="">
            <div class="home_content1_text">
                <p>Nikmati Fitur Gratis Saat Pertama Kali <br>Menggunakan Layanan Kami </p>
            </div>
        </div>

        <div class="home_content2">
            <p>Bidang Jasa Terpopuler</p>

            <div class="home_content2_button">
                <a href="#" class="btn_content2">Marketing</a>
                <a href="#" class="btn_content2">Marketing</a>
                <a href="#" class="btn_content2">Accounting</a>
                <a href="#" class="btn_content2">Desainer Grafis</a>
                <a href="#" class="btn_content2">Data Analyst</a>
                <a href="#" class="btn_content2">Content Creator</a>
                <a href="#" class="btn_content2">Customer Service <br></a>
                <a href="#" class="btn_content2">Writer/Editor</a>
                <a href="#" class="btn_content2">Arsitek</a>
                <a href="#" class="btn_content2">Sosmed Manager</a>
                <a href="#" class="btn_content2">Tutor/Educator</a>
                <a href="#" class="btn_content2">Virtual Assistant</a>
            </div>
        </div>

        <div class="home_content3">
            <img src="../PASAUAS/asset/home_content3.png" alt="" class="animate_content34">
            <div class="home_content3_text animate_content34">
                <h4>Sulit Percaya Tanpa Portofolio? Coba Gratis Dulu</h4>
                <p>Mencari calon pekerja yang kompeten tapi sulit percaya tanpa portofolio? Kami punya solusinya!
                    Platform kami memungkinkan Anda mencoba layanan gratis dari penyedia jasa yang ingin membangun
                    portofolio.</p>
            </div>
        </div>

        <div class="home_content4">
            <div class="home_content4_text animate_content34">
                <h4>Belum Punya CV? Susah Dapat Kerja?</h4>
                <p>Belum punya CV? Sulit melamar kerja? Kami bantu Anda! Tawarkan jasa pertama secara gratis untuk
                    membangun portofolio dan raih kepercayaan recruiter.</p>
            </div>
            <img src="../PASAUAS/asset/home_content4.png" alt="" class="animate_content34">
        </div>

        <div class="testimonial-section">
            <div class="testimonial-header">
                <h2>Ribuan orang terbantu dengan adanya PASA</h2>
                <p>Simak cerita mereka, Sekarang waktumu!</p>
            </div>
            <div class="testimonial">
                <div class="testimonial-container">
                    <!-- Content sebelumnya -->
                    <div class="testimonial-card">
                        <img src="asset/worker1.png" alt="Profile 5">
                        <p>PASA benar-benar membuka jalan bagi saya. Setelah memberikan free service pertama, saya langsung mendapatkan testimoni positif dari klien. Dari situ, pekerjaan mulai berdatangan</p>
                        <h3>Nabila<br><span>UX Designer</span></h3>
                    </div>
                </div>
                <div class="testimonial-container">
                    <!-- Content sebelumnya -->
                    <div class="testimonial-card">
                        <img src="asset/worker2.jpeg" alt="Profile 5">
                        <p>Saya selalu kesulitan membangun portofolio karena belum ada klien yang percaya. Berkat PASA, saya bisa menawarkan jasa pertama saya secara gratis. Sekarang, saya punya pengalaman nyata yang bisa saya tampilkan</p>
                        <h3>Jane Doe<br><span>UX Designer</span></h3>
                    </div>
                </div>
                <div class="testimonial-container">
                    <!-- Content sebelumnya -->
                    <div class="testimonial-card">
                        <img src="asset/worker3.jpg" alt="Profile 5">
                        <p>Saya sangat terbantu dengan PASA karena saya dapat mengembangkan portofolio saya dengan cepat. Fitur
                            free service PASA membuat semuanya lebih mudah.</p>
                        <h3>Jane Doe<br><span>UX Designer</span></h3>
                    </div>
                </div>
                <div class="testimonial-container">
                    <!-- Content sebelumnya -->
                    <div class="testimonial-card">
                        <img src="asset/worker4.jpeg" alt="Profile 5">
                        <p>Saya sangat terbantu dengan PASA karena saya dapat mengembangkan portofolio saya dengan cepat. Fitur
                            free service PASA membuat semuanya lebih mudah.</p>
                        <h3>Jane Doe<br><span>UX Designer</span></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="articles-container">
            <div class="article">
                <img src="asset/artikel1.jpg" alt="Image 1">
                <div class="article-content">
                    <h3>Melompat Jauh dalam Karir: Situasi Ideal atau Karbitan?</h3>
                    <p>Perencanaan Karir</p>
                    <span>6 bulan yang lalu</span>
                </div>
            </div>
            <div class="article">
                <img src="asset/artikel2.jpg" alt="Image 2">
                <div class="article-content">
                    <h3>Mengenal Profesi Growth Hackers di Dunia Startup</h3>
                    <p>Dunia Kerja</p>
                    <span>Lebih dari 3 tahun yang lalu</span>
                </div>
            </div>
            <div class="article">
                <img src="asset/artikel3.jpg" alt="Image 3">
                <div class="article-content">
                    <h3>Funding Officer: Gaji, Skill yang Diperlukan, dan Tugas Tanggung Jawabnya</h3>
                    <p>Profesi</p>
                    <span>6 bulan yang lalu</span>
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
            <h4>Rekruiter</h4>
            <li><a href="#">Cari penyedia jasa</a></li>
            <li><a href="#">Layanan</a></li>
            <li><a href="#">Tips mencari jasa</a></li>
        </div>
    </footer>

    <script>
        // Fungsi untuk mengecek apakah elemen terlihat di viewport
        function isInViewport(element) {
            const rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Fungsi untuk menambahkan kelas "visible" ke elemen yang terlihat
        function handleScroll() {
            const buttons = document.querySelectorAll('.btn_content2');
            buttons.forEach(button => {
                if (isInViewport(button)) {
                    button.classList.add('visible');
                }
            });
        }

        // Event listener untuk scroll
        window.addEventListener('scroll', handleScroll);

        // Jalankan fungsi saat halaman pertama kali dimuat
        document.addEventListener('DOMContentLoaded', handleScroll);



        document.addEventListener("DOMContentLoaded", () => {
            const elementsRight = document.querySelectorAll(".home_content3 .animate_content34");
            const elementsLeft = document.querySelectorAll(".home_content4 .animate_content34");

            const handleScroll = () => {
                [...elementsRight, ...elementsLeft].forEach(element => {
                    const rect = element.getBoundingClientRect();
                    if (rect.top < window.innerHeight && rect.bottom >= 0) {
                        if (element.closest('.home_content3')) {
                            element.classList.add("show", "from-right");
                        } else if (element.closest('.home_content4')) {
                            element.classList.add("show", "from-left");
                        }
                    }
                });
            };

            window.addEventListener("scroll", handleScroll);
            handleScroll(); // Jalankan saat halaman dimuat
        });

        window.addEventListener('scroll', () => {
            const cards = document.querySelectorAll('.testimonial-card');
            const triggerHeight = window.innerHeight * 0.8;

            cards.forEach(card => {
                const cardTop = card.getBoundingClientRect().top;
                if (cardTop < triggerHeight) {
                    card.classList.add('active');
                }
            });
        });

        const articles = document.querySelectorAll('.article');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        articles.forEach(article => observer.observe(article));
    </script>
    
    </body>


</html>