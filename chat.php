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

        .chat-container {
            margin-top: 120px;
            display: flex;
            height: 84vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 25%;
            background: #fff;
            border-right: 1px solid #ddd;
            padding: 20px;
            border-radius: 20px;
            margin-left: 20px;
        }

        .sidebar h3 {
            margin: 0 0 10px;
        }

        .search-box {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-box input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
        }

        .search-box i {
            margin-left: -30px;
            cursor: pointer;
        }

        /* Chat List Styling */
        .chat-list {
            display: flex;
            flex-direction: column;
        }

        .chat-item {
            display: flex;
            align-items: center;
            padding: 10px;
            cursor: pointer;
            border-radius: 10px;
            transition: background 0.3s;
        }

        .chat-item.active,
        .chat-item:hover {
            background: #D3EAFF;
        }

        .chat-item h4 {
            font-size: 14px;
            font-weight: 550;
        }

        .chat-item p {
            font-size: 12px;
            font-weight: 400;
            color: #555;
        }

        .chat-item img {
            border-radius: 50%;
            margin-right: 10px;
            width: 50px;
            height: 50px;
        }

        /* Main Chat Section Styling */
        .chat-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #fff;
            border-radius: 20px;
            margin: 0px 20px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .chat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .chat-header h3 {
            font-size: 17px;
            font-weight: 600;
        }

        .chat-header p {
            font-size: 13px;
            color: #555;
        }

        .chat-header img {
            border-radius: 50%;
            margin-right: 10px;
            width: 70px;
            height: 70px;
        }

        .header-info {
            flex: 1;
        }

        .hire-button {
            padding: 10px 20px;
            border: none;
            background: #5DADE2;
            color: #000;
            border-radius: 20px;
            cursor: pointer;
        }

        .hire-button:hover {
            background: #3498DB;
        }

        .chat-box {
            flex: 1;
            padding: 20px 0;
        }

        .intro-text {
            color: #555;
            font-style: italic;
            text-align: center;
        }

        .chat-footer {
            display: flex;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .chat-footer input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
        }

        .send-button {
            padding: 10px 20px;
            border: none;
            background: #5DADE2;
            color: #000;
            border-radius: 20px;
            cursor: pointer;
            margin-left: 10px;
        }

        .send-button:hover {
            background: #3498DB;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .chat-main {
                width: 100%;
                margin: 0;
                border-radius: 0;
            }
        }


        .user-message {
            text-align: right;
            background: #06D001;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 10px 0;
            max-width: 50%;
            /* Maksimal hanya setengah layar */
            word-wrap: break-word;
            display: inline-block;
            box-sizing: border-box;
            float: right;
            /* Memindahkan pesan ke pojok kanan */
            clear: both;
            /* Menghindari tumpang tindih elemen lain */
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
                <li><a href="profile.html">Profile</a></li>
            </ul>
        </nav>

        <a href="login.php" class="btn_login">Login</a>
    </header>


    <content>
        <div class="chat-container">
            <!-- Sidebar -->
            <div class="sidebar">
                <h3>Semua Pesan</h3>
                <div class="search-box">
                    <input type="text" placeholder="Cari pesan...">
                    <i class='bx bx-search'></i>
                </div>
                <div class="chat-list">
                    <div class="chat-item active">
                        <img src="../PASAUAS/asset/worker1.png" alt="Profile Picture">
                        <div class="chat-info">
                            <h4>Nabila</h4>
                            <p>Jadi bang?</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Chat Section -->
            <div class="chat-main">
                <div class="chat-header">
                    <img src="../PASAUAS/asset/worker1.png" alt="Profile Picture">
                    <div class="header-info">
                        <h3>Nabila</h3>
                        <p>Online • Rata-rata waktu respon: 1 Jam</p>
                    </div>
                    <button class="hire-button">Sewa Jasa</button>
                </div>
                <div class="chat-box">
                    <p class="intro-text">Tanya Nabila atau kirim detail project kamu</p>
                </div>
                <div class="chat-footer">
                    <input type="text" id="messageInput" placeholder="Kirim pesan">
                    <button class="send-button"><i class='bx bx-send'></i></button>
                </div>
            </div>
        </div>

        <script>
            // Menghandle pengiriman pesan

            document.addEventListener("DOMContentLoaded", () => {
                const sendButton = document.querySelector(".send-button");
                const messageInput = document.getElementById("messageInput");
                const chatBox = document.querySelector(".chat-box");
                const introText = document.querySelector(".intro-text");

                sendButton.addEventListener("click", () => {
                    sendMessage();
                });

                messageInput.addEventListener("keypress", (event) => {
                    if (event.key === "Enter") {
                        sendMessage();
                    }
                });

                function sendMessage() {
                    const message = messageInput.value.trim();
                    if (message !== "") {
                        if (introText) {
                            introText.style.display = "none"; // Menghilangkan teks saat pesan dikirim
                        }
                        // Membuat elemen pesan dengan class khusus untuk posisi kanan
                        const messageElement = document.createElement("p");
                        messageElement.textContent = message;
                        messageElement.classList.add("user-message");
                        chatBox.appendChild(messageElement);
                        messageInput.value = "";
                        chatBox.scrollTop = chatBox.scrollHeight; // Auto scroll ke bawah
                    }
                }
            });



        </script>
    </content>

</body>

</html>