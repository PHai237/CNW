<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM flowers WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        header("Location: admin.php");
        exit();
    } else {
        echo "Lỗi khi xóa hoa: " . $conn->error;
    }
} else {
    echo "Không có ID hoa!";
}
?>
