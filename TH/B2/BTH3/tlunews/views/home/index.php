<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #74b9ff, #a29bfe);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            padding: 20px;
        }

        /* Header */
        header {
            display: flex;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 15px;
            color: #FFD700;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }

        header .menu-bar {
            display: flex;
            align-items: center;
            gap: 20px;
            flex: 1;
        }

        header .menu-bar h1 {
            font-size: 50px;
            text-transform: uppercase;
            color: #FFD700;
            margin: 0;
            padding: 0 1%;
        }

        header .menu-bar nav span {
            text-transform: uppercase;
            font-size: 20px;
            color: #E6E6FA;
            padding: 5px 10px;
            margin-right: 7px;
            border-radius: 8px;
            transition: color 0.3s, background-color 0.3s;
            cursor: pointer;
        }

        header .menu-bar nav span:hover {
            background-color: #6c5ce7;
            color: #fff;
        }

        header .menu-bar nav span.active {
            background-color: #74b9ff;
            color: #333;
            font-weight: bold;
        }

        /* Footer */
        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: #FFD700;
            padding: 20px 5%;
            text-align: center;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .footer-container div {
            flex: 1 1 30%;
            margin: 10px;
            text-align: left;
        }

        .footer-container h4 {
            font-size: 20px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .footer-container p, .footer-container ul {
            font-size: 16px;
            margin: 5px 0;
        }

        .footer-container ul {
            list-style: none;
            padding: 0;
        }

        .footer-container ul li a {
            text-decoration: none;
            color: #FFD700;
            transition: color 0.3s ease;
        }

        .footer-container ul li a:hover {
            color: #A9A9A9;
        }

        .icons a {
            margin: 0 10px;
            display: inline-block;
            width: 25px;
            height: 25px;
        }

        .copyright {
            border-top: 1px solid #FFD700;
            padding-top: 10px;
        }

        header .actions .logout {
            padding: 7px 12px;
            background: linear-gradient(120deg, #0984e3, #6c5ce7);
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <header>
        <div class="menu-bar">
            <h1>Web Báo</h1>
            <nav>
                <?php
                $current_page = $_GET['page'] ?? 'home';

                $menuItems = [
                    ["Trang Chủ", "home"],
                    ["Tin Mới", "news"],
                    ["Tin Nổi Bật", "trending"],
                    ["Danh Mục", "categories"],
                    ["Liên Hệ", "contact"]
                ];

                foreach ($menuItems as $item) {
                    $page = strtolower($item[1]);
                    $class = ($current_page === $page) ? 'class="active"' : '';
                    echo "<span $class>{$item[0]}</span>";
                }
                ?>
            </nav>
        </div>
        <div class="actions">
            <form method="post" action="logout">
                <button type="submit" name="logout" class="logout">Đăng xuất</button>
            </form>
        </div>
    </header>

    <main>
        
    </main>

    <footer>
        <div class="footer-container">
            <!-- Thông tin liên hệ -->
            <div class="contact">
                <h4>Liên hệ với chúng tôi</h4>
                <p>Email: support@webbao.com</p>
                <p>Hotline: 0123-456-789</p>
                <p>Địa chỉ: Số 1, Đường ABC, Quận XYZ, Thành phố Hà Nội</p>
            </div>

            <!-- Liên kết quan trọng -->
            <div class="links">
                <h4>Liên kết</h4>
                <ul>
                    <li><a href="">Chính sách bảo mật</a></li>
                    <li><a href="">Điều khoản sử dụng</a></li>
                    <li><a href="">Gửi phản hồi</a></li>
                </ul>
            </div>

            <!-- Mạng xã hội -->
            <div class="social">
                <h4>Kết nối với chúng tôi</h4>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
                <div class="icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <!-- Thông tin bản quyền -->
        <div class="copyright">
            <p>© 2024 Web Báo. Bảo lưu mọi quyền.</p>
        </div>
    </footer>
</body>
</html>