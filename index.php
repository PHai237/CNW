<?php include 'header.php'; ?>
<?php include 'products.php'; ?>

<main>
    <a href="add.php" style="text-decoration:none" class="btn-add">Thêm mới</a>
    
    <?php if (empty($products)): ?>
        <p style="text-align: center; margin-top: 80px; font-size:30px; font-weight: bold">Hiện tại không có sản phẩm nào.</p>
    <?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá thành</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $index => $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= htmlspecialchars($product['price']) ?></td>
                <td>
                    <a href="edit.php?index=<?= $index ?>" style="text-decoration:none" class="btn-edit">📝</a>
                </td>
                <td>
                    <form action="delete.php" method="post" style="display: inline">
                        <input type="hidden" name="index" value="<?= $index ?>">
                        <button type="submit" class="btn-delete">🚮</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</main>

<style>
    main {
        padding: 20px;
        margin-top: 30px;
    }
    table {
        margin: auto;
        margin-top: 40px;
        width: 90%;
        border-collapse: collapse;
    }
    table th, table td {
        border: none;
        border-bottom: 1px solid #aaa;
        padding: 10px;
        text-align: left;
        width: auto;
    }
    table th {
        font-size: 20px;
    }
    .btn-add {
        margin-bottom: 20px;
        padding: 10px 15px;
        margin-left: auto;
        margin-right: auto;
        display: inline-block;
        text-align: center;
        background-color: #09E100;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    .btn-add:hover {
        background-color: #06AD00;
    }
    .btn-edit, .btn-delete {
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-edit {
        background-color: #ffc107;
        color: white;
    }
    .btn-edit:hover {
        background-color: #e0a800;
    }
    .btn-delete {
        background-color: #dc3545;
        color: white;
    }
    .btn-delete:hover {
        background-color: #b71c1c;
    }
</style>

<?php include 'footer.php'; ?>