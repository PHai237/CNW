<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tin tức</title>
</head>
<body>
    <h1>Sửa tin tức</h1>
    <form method="POST">
        <label for="title">Tiêu đề:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $news['title']; ?>" required><br>

        <label for="content">Nội dung:</label><br>
        <textarea id="content" name="content" required><?php echo $news['content']; ?></textarea><br>

        <label for="image">Hình ảnh:</label><br>
        <input type="text" id="image" name="image" value="<?php echo $news['image']; ?>" required><br>

        <label for="category_id">Danh mục:</label><br>
        <input type="number" id="category_id" name="category_id" value="<?php echo $news['category_id']; ?>" required><br>

        <button type="submit">Lưu</button>
    </form>
</body>
</html>
