<?php
include(__DIR__ . '/assets/database/dbungdung_tailieu.php');

// Cập nhật nếu người dùng nhấn nút "Cập nhật"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $hocphan = $_POST['hocphan'];
    $tieude = $_POST['tieude'];
    $link = $_POST['link'];

    $sql_update = "UPDATE videos SET hocphan=?, tieude=?, link=? WHERE id=?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("sssi", $hocphan, $tieude, $link, $id);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?edit_id=$id&status=updated");
        exit();
    } else {
        echo "Lỗi cập nhật: " . $stmt->error;
    }
    $stmt->close();
}

// Truy xuất dữ liệu để hiển thị trong form
if (isset($_GET['edit_id']) && is_numeric($_GET['edit_id'])) {
    $edit_id = (int)$_GET['edit_id'];
    $sql = "SELECT * FROM video WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $data = $result->fetch_assoc();
    } else {
        echo "<p class='error'>Không tìm thấy video.</p>";
        exit();
    }
    $stmt->close();
} else {
    echo "<p class='error'>Không xác định video cần sửa.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa video học tập</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            padding: 40px 20px;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 30px 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: rgb(255, 4, 4);
            font-size: 24px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            color: #34495e;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 4px #007bff;
        }

        .button {
            display: inline-block;
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 6px;
            background-color: #3498db;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #2980b9;
        }

        .success-message {
            max-width: 600px;
            margin: 20px auto;
            padding: 15px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 6px;
            text-align: center;
            font-weight: bold;
        }

        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .button-container .button {
            flex: 1;
            margin-bottom: 0;
        }
    </style>
</head>
<body>

<?php if (isset($_GET['status']) && $_GET['status'] === 'updated'): ?>
    <div class="success-message">✅ Video đã được cập nhật thành công!</div>
<?php endif; ?>

<div class="form-container">
    <h2>Chỉnh sửa video học tập</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">

        <label for="hocphan">Học phần:</label>
        <input type="text" name="hocphan" id="hocphan" value="<?= htmlspecialchars($data['hocphan']) ?>" required>

        <label for="tieude">Tiêu đề video:</label>
        <input type="text" name="tieude" id="tieude" value="<?= htmlspecialchars($data['tieude']) ?>" required>

        <label for="link">Link video (YouTube):</label>
        <input type="text" name="link" id="link" value="<?= htmlspecialchars($data['link']) ?>" required>

        <div class="button-container">
            <input type="submit" name="update" value="Cập nhật" class="button">
            <a href="admin_quanli_videotl.php" class="button">Quay lại trang quản lí</a>
        </div>
    </form>
</div>

</body>
</html>
