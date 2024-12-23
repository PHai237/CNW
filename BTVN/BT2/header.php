<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            display: flex;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .header {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .header h1 {
            font-size: 35px;
            margin: 0;
            color: black;
            font-weight: bold;
            text-transform: uppercase;
        }
        .header nav {
            display: flex;
            gap: 15px;
        }
        .header nav a {
            text-decoration: none;
            color: #555;
            font-size: 20px;
            font-weight: 500;
            transition: color 0.3s;
        }
        nav a strong {
            color: black;
        }
        .header nav a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <header>
        <div class="header">
            <h1>Administration</h1>
            <nav>
                <?php
                $menuItems = [
                    ["Trang chủ", "#"],
                    ["Trang ngoài", "#"],
                    ["Thể loại", "#", true],
                    ["Tác giả", "#"],
                    ["Bài viết", "#"]
                ];

                foreach ($menuItems as $item) {
                    $name = $item[0];
                    $link = $item[1];
                    $isStrong = $item[2] ?? false;

                    echo $isStrong 
                        ? "<a href='$link'><strong>$name</strong></a>" 
                        : "<a href='$link'>$name</a>";
                }
                ?>
            </nav>
        </div>
    </header>
</body>
</html>