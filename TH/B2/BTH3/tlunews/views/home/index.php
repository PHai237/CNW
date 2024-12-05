<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        header {
            display: flex;
            align-items: center;
            position: relative;
            background-color: #4B0082;
            border-bottom: 4px solid #8B0000;
        }

        header .menu-bar {
            display: flex;
            align-items: center;
            gap: 1.5vw;
        }

        header .menu-bar h1 {
            font-size: 1.8vw;
            text-transform: uppercase;
            color: #FFD700;
            padding: 0 1vw;
            word-spacing: 2px;
        }

        header .menu-bar nav a {
            text-decoration: none;
            text-transform: uppercase;
            padding-right: 1vw;
            font-size: 1.1vw;
            color: #E6E6FA;
            transition: color 0.3s ease, font-weight 0.3s ease;
        }

        header .menu-bar nav a:hover {
            color: #B0C4DE;
            text-shadow: 0 0 1px #FFFFFF;
        }

        header .menu-bar nav a.active {
            font-weight: bold;
            color: #A9A9A9;
            text-shadow: 0 0 10px #708090;
        }

        footer {
            width: 100%;
            text-align: center;
            margin-top: auto;
            border-top: 3px solid #8B0000;
            font-size: 20px;
            bottom: 0;
            position: absolute;
            background-color: #191970;
            color: #FFD700;
            padding: 10px 0;
        }

        footer h3 {
            font-weight: 100;
            font-size: 35px;
            line-height: 1vw;
            font-variation-settings: 'wght'100, 'wdth'85;
            letter-spacing: 1.5px;
            color: #FFD700;
        }

        footer h3 .char {
            display: inline-block;
            --delay:calc((var(--char-index) + 1) * 200ms);
            animation: breathe 4000ms infinite both;
            animation-delay: var(--delay);
        }

        @keyframes breathe {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }

            50% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(0.9);
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="menu-bar">
            <h1>Shopping is life</h1>
            <nav>
                <?php
                $current_page = $_GET['page'] ?? 'home';

                $menuItems = [
                    ["Trang Chủ", "?page=home"],
                    ["Phổ Biến", "?page=hot"],
                    ["Giỏ Hàng", "?page=cart"],
                    ["Tài Khoản", "?page=info"]
                ];

                foreach ($menuItems as $item) {
                    $page = strtolower($item[0]);
                    $link = $item[1];
                    $class = ($current_page === ($page)) ? 'class = "active"' : '';

                    echo "<a href='$link' $class>$item[0]</a>";
                }
                ?>
            </nav>
        </div>
    </header>

    <main>

    </main>

    <footer>
        <h3>
            <span class="char" style="--char-index: 0;">S</span>
            <span class="char" style="--char-index: 1;">H</span>
            <span class="char" style="--char-index: 2;">O</span>
            <span class="char" style="--char-index: 3;">P</span>
            <span class="char" style="--char-index: 4;">P</span>
            <span class="char" style="--char-index: 5;">I</span>
            <span class="char" style="--char-index: 6;">N</span>
            <span class="char" style="--char-index: 7;">G</span>
            <span class="char" style="--char-index: 8;"> </span>
            <span class="char" style="--char-index: 9;">I</span>
            <span class="char" style="--char-index: 10;">S</span>
            <span class="char" style="--char-index: 11;"> </span>
            <span class="char" style="--char-index: 12;">L</span>
            <span class="char" style="--char-index: 13;">I</span>
            <span class="char" style="--char-index: 14;">F</span>
            <span class="char" style="--char-index: 15;">E</span>
        </h3>
    </footer>
</body>
</html>