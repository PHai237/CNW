<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tin tức</title>
</head>
<body>
    <h1>Danh sách tin tức</h1>

    <!-- Form tìm kiếm -->
    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Tìm kiếm tin tức...">
        <button type="submit">Tìm kiếm</button>
    </form>

    <ul>
        <?php foreach ($newsList as $news): ?>
            <li>
                <a href="index.php?controller=Home&action=detail&id=<?php echo $news['id']; ?>">
                    <?php echo $news['title']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
