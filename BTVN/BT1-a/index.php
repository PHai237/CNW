<?php include 'header.php'; ?>
<?php include 'products.php'; ?>

<main>
    <div class="container">
        <div class="add">
            <a href="" class="add-btn">Add New</a>
        </div>

        <?php if (empty($products)): ?>
            <p>Currently, there are no products available.</p>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($products as $index => $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= htmlspecialchars($product['price']) ?></td>
                    <td>
                        <a href="" class="edit-btn">📖</a>
                    </td>
                    <td>
                        <form action="" method="post" class="del-form"">
                            <input type="hidden" name="index" value="<?= $index ?>">
                            <button type="submit" class="del-btn">⚔️</button>
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
        background: linear-gradient(135deg, #4b2e16, #7a5230);
        border-radius: 10px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.5);
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        width: 90%;
        margin: auto;
        background: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
    }

    .add {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 20px;
    }

    .add-btn {
        padding: 10px 20px;
        background: linear-gradient(135deg, #6b8e23, #556b2f);
        color: white;
        border: 2px solid #3d5221;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    }

    .add-btn:hover {
        background: linear-gradient(135deg, #556b2f, #3d5221);
    }

    .container p {
        text-align: center;
        margin-top: 80px;
        font-size: 30px;
        font-weight: bold;
        color: #5b3d21;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
    }

    table {
        margin: auto;
        width: 100%;
        border-collapse: collapse;
        background: rgba(255, 255, 255, 0.9);
        border: 2px solid #7a5230;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    }

    table th, table td {
        border: none;
        border-bottom: 1px solid #aaa;
        padding: 15px;
        text-align: left;
    }

    table th {
        font-size: 20px;
        font-weight: bold;
        background: linear-gradient(135deg, #7a5230, #4b2e16);
        color: #fff;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }

    table td {
        font-size: 16px;
        color: #333;
    }

    .edit-btn {
        padding: 5px 10px;
        background-color: #ffc107;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        font-weight: bold;
        font-size: 18px;
    }

    .edit-btn:hover {
        background-color: #e0a800;
    }

    .del-btn {
        padding: 5px 10px;
        background-color: #dc3545;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        font-size: 18px;
        border: none;
    }

    .del-btn:hover {
        background-color: #b71c1c;
    }

    .del-form {
        display: inline;
    }
</style>

<?php include 'footer.php'; ?>