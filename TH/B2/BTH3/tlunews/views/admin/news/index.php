<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tin tức</title>
</head>
<body>
    <h1>Danh sách tin tức</h1>
    <a href="index.php?controller=News&action=add">Thêm tin tức</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsList as $news): ?>
                <tr>
                    <td><?php echo $news['id']; ?></td>
                    <td><?php echo $news['title']; ?></td>
                    <td><img src="<?php echo $news['image']; ?>" alt="Image" width="50"></td>
                    <td><?php echo $news['category_id']; ?></td>
                    <td>
                        <a href="index.php?controller=News&action=edit&id=<?php echo $news['id']; ?>">Sửa</a>
                        <a href="index.php?controller=News&action=delete&id=<?php echo $news['id']; ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
