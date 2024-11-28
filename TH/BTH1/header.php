<?php
session_start();
if (!isset($_SESSION['role'])) $_SESSION['role'] = 'guest';
if (isset($_POST['login']) && $_POST['password'] === 'admin123') $_SESSION['role'] = 'admin';
if (isset($_POST['logout'])) $_SESSION['role'] = 'guest';
?>

<header>
    <div class="switch">
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <form method="POST">
                <button type="submit" name="logout" class="add-btn">Guest</button>
            </form>
            <a href="add.php" class="add-btn" style="float: right;">Thêm</a>
        <?php else: ?>
            <form method="POST">
                <input type="password" name="password" placeholder="Mật khẩu" style="margin-right: 10px;">
                <button type="submit" name="login" class="add-btn">Admin</button>
            </form>
        <?php endif; ?>
    </div>
    <h1>FL🌸WER'S SHOP</h1>
</header>

<style>
    header {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        background: linear-gradient(135deg, #5a3c3c, #4e2b2b);
        padding: 20px 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
        border-bottom: 4px solid #3b1a1a;
    }

    .switch {
        position: absolute;
        left: 20px;
        display: flex;
        align-items: center;
    }

    .add-btn, .guest-btn, .login-btn {
        padding: 12px 22px;
        background: #6b8e23;
        color: white;
        border: 2px solid #4e5b23;
        border-radius: 10px;
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        transition: all 0.3s ease;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    }

    .add-btn:hover, .guest-btn:hover, .login-btn:hover {
        background: #4e5b23;
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
    }

    .add-btn {
        float: right;
    }

    .guest-btn {
        margin-right: 10px;
    }

    input[type="password"] {
        padding: 10px;
        border-radius: 8px;
        border: 2px solid #7a5230;
        background-color: #1e1e1e;
        color: white;
        font-size: 16px;
        margin-right: 10px;
        transition: background-color 0.3s ease;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
    }

    input[type="password"]:focus {
        background-color: #3e3e3e;
        outline: none;
    }

    h1 {
        font-size: 34px;
        color: #f9d293;
        text-align: center;
        text-transform: uppercase;
        margin: 0;
        letter-spacing: 1px;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        flex: 1;
    }

    /* Các kiểu cho các nút sửa và xóa */
    .flower .admin-actions {
        display: flex;
        justify-content: space-around;
        margin-top: 10px;
    }

    .edit-btn, .delete-btn {
        padding: 8px 15px;
        font-size: 16px;
        font-weight: bold;
        background: #ff5722;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .edit-btn:hover {
        background: #e64a19;
    }

    .delete-btn:hover {
        background: #d32f2f;
    }
</style>