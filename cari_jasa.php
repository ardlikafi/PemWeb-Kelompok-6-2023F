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
    <title>jasa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <style>
        /* style.css */

        /* Variables */
        :root {
            --primary-color: #007bff;
            --text-color: #333;
            --secondary-color: #555;
            --light-gray: #ddd;
            --white: #fff;
            --background-color-light: #eee;
            --blue-background-color: #D3EAFF;
        }

        /* Common Styles */
        body {
            font-family: "Poppins", sans-serif;
        }

        /* CARI JASA */
        .search {
            margin: 150px 0 60px 180px;
            display: flex;
        }

        .search-bar {
            width: 300px;
            height: 40px;
            background-color: var(--white);
            border-radius: 8px;
            display: flex;
            align-items: center;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .search-bar i {
            font-size: 20px;
            color: var(--text-color);
        }

        .search-bar input {
            flex: 1;
            height: 30px;
            border: none;
            outline: none;
            font-size: 15px;
            padding-left: 15px;
        }

        .select-menu {
            width: 300px;
            margin-left: 50px;
            position: relative;
            /* Add this line */
        }

        .select-menu .select-btn {
            display: flex;
            height: 20px;
            background-color: var(--white);
            padding: 20px;
            font-size: 15px;
            font-weight: 400;
            border-radius: 8px;
            align-items: center;
            cursor: pointer;
            justify-content: space-between;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }




        .select-btn i {
            font-size: 20px;
            transition: 0.3s;
        }

        .select-menu.active .select-btn i {
            transform: rotate(-180deg);
        }

        .select-menu .options {
            position: absolute;
            /* Add this line */
            padding: 5px;
            margin-top: 10px;
            border-radius: 8px;
            background-color: var(--white);
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 10;
            /* Add this line */
            width: 100%;
            /* Add this line to make dropdown same width as .select-menu*/
        }

        .select-menu.active .options {
            display: block;
        }

        .options .option {
            display: flex;
            margin: 10px 0px;
            padding-left: 20px;
            height: 30px;
            cursor: pointer;
            padding: 0 px;
            border-radius: 8px;
            align-items: center;
            background-color: var(--white);
        }

        .options .option:hover {
            background: #F2F2F2;
        }

        .option i {
            font-size: 25px;
            margin-right: 12px;
        }

        .option .option-text {
            font-size: 14px;
        }

        .worker {
            display: flex;
            background-color: var(--white);
            width: 80%;
            margin-left: 180px;
            margin-bottom: 20px;
            /* display: flex; Hilangkan property flex*/
            border-radius: 10px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
        }

        .list-worker {
            margin: 20px 10px;
            background-color: var(--white);
            width: 40%;
            max-height: 850px;
            overflow: hidden;
        }


        .worker1 {
            display: flex;
            background-color: var(--blue-background-color);
            margin: 15px 20px;
            width: 90%;
            padding: 18px;
            height: 150px;
            border-radius: 6px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .flex-worker {
            margin-left: 15px;
            margin-top: 0;
            text-align: center;
        }

        .flex-worker img {
            margin-bottom: 1px;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 3px solid var(--white);
        }

        .flex-worker .name-worker {
            font-family: "Poppins", serif;
            font-weight: 500;
            font-size: 17px;
        }

        .info-worker {
            list-style: none;
            margin: 3px 60px;
        }

        .info-worker .detail-worker {
            width: 230px;
        }

        .detail-worker li {
            display: flex;
            margin-bottom: 15px;
        }

        .detail-worker i {
            font-size: 15px;
        }

        .detail-worker p {
            font-weight: 500;
            font-size: 12px;
            margin-left: 10px;
        }

        .description-worker {
            min-width: 60%;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            margin-bottom: 10px;
        }

        .description-worker.active {
            opacity: 1;
            transform: translateY(0);
        }


        .description-header {
            margin: 30px 10px;
            height: 23vh;
            border-radius: 10px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
        }

        .profile-header {
            display: flex;
            margin: 20px;
        }

        .profile-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-top: 10px;
        }

        .profile-header .rating {
            margin-top: 30px;
            margin-left: 20px;
        }

        .profile-header h4 {
            height: fit-content;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: 500;
        }

        .rating-specific {
            display: flex;
        }

        .rating-specific i {
            margin-top: 4px;
            font-size: 15px;
            color: #FFEB00;
        }

        .rating-specific p>bold {
            font-size: 15px;
            font-weight: 600;
            margin-right: 10px;
        }

        .rating-specific p {
            margin-left: 5px;
            font-size: 10px;
            color: var(--text-color);
        }

        .button-chat {
            display: flex;
            background-color: var(--white);
            margin-left: 20px;
            border-radius: 5px;
            padding: 7px;
            width: fit-content;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .button-chat i {
            font-size: 22px;
        }

        .button-chat a {
            text-decoration: none;
            color: var(--text-color);
            font-size: 13px;
            margin-left: 8px;
            font-weight: 500;
        }

        .description-main {
            margin: 0px 10px;
            height: fit-content;
            width: 710px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
        }

        .description-box {
            display: flex;
        }

        .info-section {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }

        .info-item h4 {
            font-size: 14px;
            color: var(--secondary-color);
            margin-bottom: 5px;
        }

        .info-item p {
            font-size: 14px;
            color: var(--text-color);
            width: 300px;
        }

        hr {
            border: none;
            border-top: 1px solid var(--light-gray);
            margin: 15px 0;
        }

        .description-main .description {
            font-size: 14px;
            color: var(--text-color);
            line-height: 1.6;
        }

        .no-selection {
            font-family: "Poppins", serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            font-size: 20px;
            color: var(--secondary-color);
            font-weight: bold;
            text-align: center;
        }

        .wrong-selection {
            display: block;
        }

        .no-selection p {
            font-size: 15px;
            font-weight: 600;
        }


        /* Pagination Styling */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .pagination button {
            background: var(--white);
            color: var(--text-color);
            border: 1px solid var(--light-gray);
            padding: 10px 15px;
            margin: 0 5px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .pagination button:hover:not(:disabled) {
            background: var(--background-color-light);
        }

        .pagination button:disabled {
            background: #ccc;
            cursor: not-allowed;
            color: #666;
        }

        #page-numbers {
            display: flex;
            gap: 5px;
        }

        .page-number {
            padding: 10px 15px;
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            cursor: pointer;
            background: var(--white);
            color: var(--text-color);
        }

        .page-number.active {
            background: var(--primary-color);
            color: var(--white);
            border: 1px solid var(--primary-color);
            font-weight: bold;
        }

        /* Media Queries for smaller screens */
        @media screen and (max-width: 768px) {
            .search {
                margin: 100px 0 30px 20px;
                flex-direction: column;
                align-items: flex-start;
            }

            .search-bar {
                width: 100%;
                margin-bottom: 10px;
            }

            .select-menu {
                margin-left: 0;
                width: 100%;
            }

            .worker {
                margin-left: 20px;
                width: auto;
            }


            .list-worker {
                width: 100%;
                height: auto;
                max-height: 400px;
                overflow-y: scroll;
            }

            .description-worker {
                width: 100%;
                min-width: auto;
            }

            .description-main {
                width: auto;
            }

            .info-item p {
                width: auto;
            }

            .flex-worker img {
                width: 70px;
                height: 70px;
            }

            .info-worker {
                margin: 3px 30px;
            }
        }

        @media screen and (max-width: 480px) {
            .search {
                margin: 80px 0 20px 10px;
            }

            .worker {
                margin-left: 10px;
            }

            .flex-worker img {
                width: 50px;
                height: 50px;
            }

            .info-worker {
                margin: 3px 10px;
            }

            .info-worker .detail-worker {
                width: 180px;
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

        <a href="login.html" class="btn_login">Login</a>
    </header>


    <content>
        <div class="search">
            <div class="search-bar">
                <i class='bx bx-search'></i>
                <input type="text">
            </div>


            <div class="select-menu">
                <div class="select-btn">
                    <span class="sBtn-text">Semua Lokasi</span>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <ul class="options">
                    <li class="option">
                        <i class='bx bxs-map'></i>
                        <span class="option-text">Jakarta</span>
                    </li>
                    <li class="option">
                        <i class='bx bxs-map'></i>
                        <span class="option-text">Semarang</span>
                    </li>
                    <li class="option">
                        <i class='bx bxs-map'></i>
                        <span class="option-text">Surabaya</span>
                    </li>
                    <li class="option">
                        <i class='bx bxs-map'></i>
                        <span class="option-text">Depok</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="worker">
            <div class="list-worker">
                <div class="worker1">
                    <div class="flex-worker">
                        <img src="../PASAUAS/asset/worker1.png" alt="">
                        <h4 class="name-worker">Nabila</h4>
                    </div>
                    <div class="info-worker">
                        <div class="detail-worker">
                            <li><i class='bx bxs-briefcase'></i>
                                <p> Database Enginer</p>
                            </li>
                            <li><i class='bx bxs-map'></i>
                                <p> Surabaya</p>
                            </li>
                            <li><i class='bx bxs-graduation'></i>
                                <p> Universitas Negeri Surabaya</p>
                            </li>
                            <li><i class='bx bx-money'></i>
                                <p> 2.500.00 - 5.000.00</p>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="worker1">
                    <div class="flex-worker">
                        <img src="../PASAUAS/asset/worker2.jpeg" alt="">
                        <h4 class="name-worker">Nabila</h4>
                    </div>
                    <div class="info-worker">
                        <div class="detail-worker">
                            <li><i class='bx bxs-briefcase'></i>
                                <p> Database Enginer</p>
                            </li>
                            <li><i class='bx bxs-map'></i>
                                <p> Surabaya</p>
                            </li>
                            <li><i class='bx bxs-graduation'></i>
                                <p> Universitas Negeri Surabaya</p>
                            </li>
                            <li><i class='bx bx-money'></i>
                                <p> 2.500.00 - 5.000.00</p>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="worker1">
                    <div class="flex-worker">
                        <img src="../PASAUAS/asset/worker3.jpg" alt="">
                        <h4 class="name-worker">Nabila</h4>
                    </div>
                    <div class="info-worker">
                        <div class="detail-worker">
                            <li><i class='bx bxs-briefcase'></i>
                                <p> Database Enginer</p>
                            </li>
                            <li><i class='bx bxs-map'></i>
                                <p> Surabaya</p>
                            </li>
                            <li><i class='bx bxs-graduation'></i>
                                <p> Universitas Negeri Surabaya</p>
                            </li>
                            <li><i class='bx bx-money'></i>
                                <p> 2.500.00 - 5.000.00</p>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="worker1">
                    <div class="flex-worker">
                        <img src="../PASAUAS/asset/worker4.jpeg" alt="">
                        <h4 class="name-worker">Nabila</h4>
                    </div>
                    <div class="info-worker">
                        <div class="detail-worker">
                            <li><i class='bx bxs-briefcase'></i>
                                <p> Database Enginer</p>
                            </li>
                            <li><i class='bx bxs-map'></i>
                                <p> Surabaya</p>
                            </li>
                            <li><i class='bx bxs-graduation'></i>
                                <p> Universitas Negeri Surabaya</p>
                            </li>
                            <li><i class='bx bx-money'></i>
                                <p> 2.500.00 - 5.000.00</p>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="worker1">
                    <div class="flex-worker">
                        <img src="../PASAUAS/asset/worker1.png" alt="">
                        <h4 class="name-worker">Nabila</h4>
                    </div>
                    <div class="info-worker">
                        <div class="detail-worker">
                            <li><i class='bx bxs-briefcase'></i>
                                <p> Database Enginer</p>
                            </li>
                            <li><i class='bx bxs-map'></i>
                                <p> Surabaya</p>
                            </li>
                            <li><i class='bx bxs-graduation'></i>
                                <p> Universitas Negeri Surabaya</p>
                            </li>
                            <li><i class='bx bx-money'></i>
                                <p> 2.500.00 - 5.000.00</p>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="worker1">
                    <div class="flex-worker">
                        <img src="../PASAUAS/asset/worker1.png" alt="">
                        <h4 class="name-worker">Nabila</h4>
                    </div>
                    <div class="info-worker">
                        <div class="detail-worker">
                            <li><i class='bx bxs-briefcase'></i>
                                <p> Database Enginer</p>
                            </li>
                            <li><i class='bx bxs-map'></i>
                                <p> Surabaya</p>
                            </li>
                            <li><i class='bx bxs-graduation'></i>
                                <p> Universitas Negeri Surabaya</p>
                            </li>
                            <li><i class='bx bx-money'></i>
                                <p> 2.500.00 - 5.000.00</p>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="worker1">
                    <div class="flex-worker">
                        <img src="../PASAUAS/asset/worker1.png" alt="">
                        <h4 class="name-worker">Nabila</h4>
                    </div>
                    <div class="info-worker">
                        <div class="detail-worker">
                            <li><i class='bx bxs-briefcase'></i>
                                <p> Database Enginer</p>
                            </li>
                            <li><i class='bx bxs-map'></i>
                                <p> Surabaya</p>
                            </li>
                            <li><i class='bx bxs-graduation'></i>
                                <p> Universitas Negeri Surabaya</p>
                            </li>
                            <li><i class='bx bx-money'></i>
                                <p> 2.500.00 - 5.000.00</p>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="worker1">
                    <div class="flex-worker">
                        <img src="../PASAUAS/asset/worker1.png" alt="">
                        <h4 class="name-worker">Nabila</h4>
                    </div>
                    <div class="info-worker">
                        <div class="detail-worker">
                            <li><i class='bx bxs-briefcase'></i>
                                <p> Database Enginer</p>
                            </li>
                            <li><i class='bx bxs-map'></i>
                                <p> Surabaya</p>
                            </li>
                            <li><i class='bx bxs-graduation'></i>
                                <p> Universitas Negeri Surabaya</p>
                            </li>
                            <li><i class='bx bx-money'></i>
                                <p> 2.500.00 - 5.000.00</p>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="worker1">
                    <div class="flex-worker">
                        <img src="../PASAUAS/asset/worker1.png" alt="">
                        <h4 class="name-worker">Nabila</h4>
                    </div>
                    <div class="info-worker">
                        <div class="detail-worker">
                            <li><i class='bx bxs-briefcase'></i>
                                <p> Database Enginer</p>
                            </li>
                            <li><i class='bx bxs-map'></i>
                                <p> Surabaya</p>
                            </li>
                            <li><i class='bx bxs-graduation'></i>
                                <p> Universitas Negeri Surabaya</p>
                            </li>
                            <li><i class='bx bx-money'></i>
                                <p> 2.500.00 - 5.000.00</p>
                            </li>
                        </div>
                    </div>
                </div>
            </div>

            <div class="description-worker">
                <div class="description-header">
                    <div class="profile-header">
                        <img src="../PASAUAS/asset/worker1.png" alt="">
                        <h4>Nabila</h4>
                        <div class="rating">
                            <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                class='bx bxs-star'></i><i class='bx bxs-star'></i>
                            <p>
                                <bold>5/5</bold> ( 79 ulasan )
                            </p>
                        </div>
                    </div>
                    <div class="button-chat">
                        <i class='bx bxs-chat'></i>
                        <a href="#" class="btn-chat">Chat sekarang</a>
                    </div>
                </div>
                <div class="description-main">
                    <div class="info-section">
                        <div class="info-item">
                            <h4>Dari</h4>
                            <p>Sumatra Selatan</p>
                        </div>
                        <div class="info-item">
                            <h4>Bahasa</h4>
                            <p>Indonesia, China</p>
                        </div>
                        <div class="info-item">
                            <h4>Rata - rata waktu respon</h4>
                            <p>1 jam</p>
                        </div>
                        <div class="info-item">
                            <h4>Anggota sejak</h4>
                            <p>20 Juli 2023</p>
                        </div>
                    </div>
                    <hr>
                    <div class="description">
                        <p>Halo, saya Vincent Bagus. Sebagai Backend Developer, saya memiliki keahlian dalam Node.js,
                            Python, Django, PostgreSQL</strong>. Saya berpengalaman dalam merancang dan membangun API
                            yang kuat, serta mengoptimalkan kinerja aplikasi.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagination">
            <button id="prev"><</button>
            <div id="page-numbers"></div>
            <button id="next">></button>
        </div>

    </content>


    <footer class="footer">
        <div class="footer_content">
            <a href="tentang_pasa.php"><img src="../PASAUAS/asset/logo_pasa.png" alt=""></a>
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
        // dropdown.js
        const optionMenu = document.querySelector(".select-menu");
        const selectBtn = optionMenu.querySelector(".select-btn");
        const options = optionMenu.querySelectorAll(".option");
        const sBtn_text = optionMenu.querySelector(".sBtn-text");

        selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));

        options.forEach(option => {
            option.addEventListener("click", () => {
                let selectedOption = option.querySelector(".option-text").innerText;
                sBtn_text.innerText = selectedOption;
                optionMenu.classList.remove("active");
            });
        });


        // worker.js
        function renderWorkerDetails(worker) {
            const name = worker.querySelector(".name-worker").textContent;
            const details = worker.querySelector(".detail-worker").innerHTML;
            const descriptionWorker = document.querySelector(".description-worker");
            descriptionWorker.classList.remove("active");
            setTimeout(() => {
                descriptionWorker.innerHTML = `
                <div class="description-header">
                    <div class="profile-header">
                        <img src="../PASAUAS/asset/worker1.png" alt="">
                            <div class="rating">
                                <h4>${name}</h4>
                            <div class="rating-specific">
                                <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i>
                            <p><bold>5/5</bold> (79 ulasan)</p>
                            </div>
                        </div>
                    </div>
                    <div class="button-chat">
                        <i class='bx bxs-chat'></i>
                        <a href="chat.php" class="btn-chat">Chat sekarang</a>
                    </div>
                </div>
            <div class="description-main">
                <div class="info-section">
                    <div class="info-item">
                        <h4>Dari</h4>
                        <p>Surabaya</p>
                    </div>
                    <div class="info-item">
                        <h4>Bahasa</h4>
                        <p>Indonesia, China</p>
                    </div>
                    <div class="info-item">
                        <h4>Rata - rata waktu respon</h4>
                        <p>1 jam</p>
                    </div>
                    <div class="info-item">
                        <h4>Anggota sejak</h4>
                        <p>20 Juli 2023</p>
                    </div>
                </div>
                <hr>
            <div class="description">
                <p>Halo, saya ${name}. Sebagai Backend Developer, saya memiliki keahlian dalam Node.js, Python, Django, PostgreSQL. Saya berpengalaman dalam merancang dan membangun API yang kuat, serta mengoptimalkan kinerja aplikasi.</p>
            </div>
            </div>
        `;
                descriptionWorker.classList.add("active");
            }, 300)
        }
        document.addEventListener("DOMContentLoaded", () => {
            const listWorkerContainer = document.querySelector('.list-worker');
            const descriptionWorker = document.querySelector(".description-worker");
            // Default content for description-worker
            descriptionWorker.innerHTML = `
            <div class="no-selection">
                <div class="wrong-selection">
                <h4>Anda Belum Memilih Kandidat</h4>
                <p>Harap pilih di sebelah kiri untuk melihat detail di sini</p>
                </>
            </>
        `;

            // Add active class to make the transition visible
            descriptionWorker.classList.add("active");
            listWorkerContainer.addEventListener('click', (event) => {
                const worker = event.target.closest('.worker1');
                if (worker) {
                    renderWorkerDetails(worker);
                }
            });

        });


        // pagination.js
        document.addEventListener("DOMContentLoaded", function () {
            const listWorkerContainer = document.querySelector(".list-worker");
            const prevButton = document.getElementById("prev");
            const nextButton = document.getElementById("next");
            const pageNumbersContainer = document.getElementById("page-numbers");
            const allWorkerDivs = Array.from(document.querySelectorAll(".worker1"));
            const itemsPerPage = 5; // jumlah pekerja per halaman
            let currentPage = 1;

            function renderWorkers() {
                listWorkerContainer.innerHTML = "";
                const start = (currentPage - 1) * itemsPerPage;
                const end = start + itemsPerPage;
                const currentWorkers = allWorkerDivs.slice(start, end);

                currentWorkers.forEach((worker) => {
                    listWorkerContainer.appendChild(worker);
                });
                renderPageNumbers();
                updateButtons();
            }

            function updateButtons() {
                prevButton.disabled = currentPage === 1;
                nextButton.disabled =
                    currentPage === Math.ceil(allWorkerDivs.length / itemsPerPage);
            }

            function renderPageNumbers() {
                pageNumbersContainer.innerHTML = "";
                const totalPages = Math.ceil(allWorkerDivs.length / itemsPerPage);

                for (let i = 1; i <= totalPages; i++) {
                    const pageButton = document.createElement("button");
                    pageButton.textContent = i;
                    pageButton.classList.add("page-number");
                    if (i === currentPage) {
                        pageButton.classList.add("active");
                    }
                    pageButton.addEventListener("click", function () {
                        currentPage = i;
                        renderWorkers();
                    });
                    pageNumbersContainer.appendChild(pageButton);
                }
            }

            prevButton.addEventListener("click", function () {
                if (currentPage > 1) {
                    currentPage--;
                    renderWorkers();
                }
            });

            nextButton.addEventListener("click", function () {
                if (currentPage < Math.ceil(allWorkerDivs.length / itemsPerPage)) {
                    currentPage++;
                    renderWorkers();
                }
            });

            renderWorkers();
        });
    </script>
    <script src="script.js"></script>
</body>

</html>