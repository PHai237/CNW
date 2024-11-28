<?php 
include 'header.php'; 
include 'flowers.php'; 
?>

<main>
    <h1>FLOWER'S LIST</h1>
    <div class="container">
        <?php foreach ($flowers as $flower): ?>
            <div class="flower">
                <img src="<?= htmlspecialchars($flower['img']); ?>" alt="<?= htmlspecialchars($flower['name']); ?>">
                <h2><?= htmlspecialchars($flower['name']); ?></h2>
                <p><?= htmlspecialchars($flower['description']); ?></p>

                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <div class="admin-actions">
                        <!-- Sửa -->
                        <a href="edit.php?flower_id=<?= $flower['id']; ?>" class="action-btn edit-btn">Sửa</a>

                        <!-- Xóa -->
                        <form method="POST" action="delete.php" style="display: inline;">
                            <input type="hidden" name="flower_id" value="<?= $flower['id']; ?>">
                            <button type="submit" class="action-btn delete-btn">Xóa</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'footer.php'; ?>

<style>
    /* Tổng quan */
    body {
        font-family: "Georgia", serif;
        margin: 0;
        padding: 0;
        background-color: #2e1a0f;
        color: #f4e3c1;
    }

    main {
        padding: 40px 20px;
    }

    h1 {
        text-align: center;
        margin: 20px 0;
        font-size: 40px;
        color: #f9d293;
        text-transform: uppercase;
        text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.8);
    }

    /* Layout danh sách */
    .container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .flower {
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid #7a5230;
        border-radius: 12px;
        padding: 15px;
        text-align: center;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.6);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        font-family: "Arial", sans-serif;
    }

    .flower:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.8);
    }

    .flower h2 {
        font-size: 30px;
        margin: 10px 0;
        color: #fff;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
    }

    .flower p {
        font-size: 18px;
        color: #f4e3c1;
        letter-spacing: 1.5px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        margin: 10px 0 20px; /* Đặt khoảng cách với nút */
    }

    .flower img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #7a5230;
    }

    /* Nút hành động (admin) */
    .admin-actions {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 15px;
    }

    .action-btn {

        font-size: 18px;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: background 0.3s ease, transform 0.2s ease;
        width: 120px;
    }

    .edit-btn {
        background: #4caf50;
        color: white;
        border: none;
        height: 22px;
    }

    .edit-btn:hover {
        background: #45a049;
        transform: scale(1.05);
    }

    .delete-btn {
        background: #f44336;
        color: white;
        border: none;
    }

    .delete-btn:hover {
        background: #d32f2f;
        transform: scale(1.05);
    }
</style>
