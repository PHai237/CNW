<?php include dirname(__DIR__, 2) . '/views/header.php'; ?>

<main>
    <div class="container">
        <a href="index.php?controller=Product&action=add" class="add-btn">Thêm mới</a>
        
        <?php if (empty($products)): ?>
            <p>Hiện tại không có sản phẩm nào.</p>
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
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= htmlspecialchars($product['price']) ?></td>
                    <td>
                        <a href="index.php?controller=Product&action=edit&id=<?= $product['id'] ?>" class="edit-btn">📝</a>
                    </td>
                    <td>
                        <form action="index.php?controller=Product&action=delete" method="post" class="delete-form">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <button type="submit" class="del-btn">🗑️</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</main>

<style>
    main {
        padding: 20px;
        margin-top: 30px;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        width: 90%;
        margin: auto;
    }

    .container p {
        text-align: center; 
        margin-top: 80px; 
        font-size:30px; 
        font-weight: bold;
    }

    .add-btn {
        margin-bottom: 40px;
        align-self: flex-start;
        padding: 10px 15px;
        background-color: #09E100;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .add-btn:hover {
        background-color: #06AD00;
    }

    main a {
        text-decoration: none;
    }

    table {
        margin: auto;
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        border: none;
        border-bottom: 1px solid #aaa;
        padding: 10px;
        text-align: left;
    }

    table th {
        font-size: 20px;
    }

    .edit-btn, .del-btn{
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .edit-btn {
        background-color: #ffc107;
        color: white;
    }

    .edit-btn:hover {
        background-color: #e0a800;
    }

    .del-btn {
        background-color: #dc3545;
        color: white;
    }

    .del-btn:hover {
        background-color: #b71c1c;
    }
</style>

<?php include dirname(__DIR__, 2) . '/views/footer.php'; ?>
