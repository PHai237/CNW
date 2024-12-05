<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
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