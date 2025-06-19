<?php
include(__DIR__ . '/assets/database/dbungdung_tailieu.php');

// Khởi tạo biến thông báo
$success = false;
$error = "";

// Nếu submit form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $nganhhoc = $_POST['nganhhoc'];
    $namhoc = $_POST['namhoc'];
    $hocphan = $_POST['hocphan'];
    $tenfile = $_POST['tenfile'];
    $duongdan = $_POST['duongdan'];

    $sql_update = "UPDATE tailieu SET nganhhoc=?, namhoc=?, hocphan=?, tenfile=?, duongdan=? WHERE id=?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("sssssi", $nganhhoc, $namhoc, $hocphan, $tenfile, $duongdan, $id);

    if ($stmt->execute()) {
        $success = true;
    } else {
        $error = "Lỗi khi cập nhật: " . $stmt->error;
    }
    $stmt->close();
}

// Nếu người dùng vào trang sửa
if (isset($_GET['edit_id']) && is_numeric($_GET['edit_id'])) {
    $edit_id = (int)$_GET['edit_id'];
    $sql_edit = "SELECT * FROM tailieu WHERE id = ?";
    $stmt = $conn->prepare($sql_edit);
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $result_edit = $stmt->get_result();

    if ($result_edit->num_rows == 1) {
        $edit_data = $result_edit->fetch_assoc();
    } else {
        echo "<p class='error'>Không tìm thấy tài liệu cần sửa.</p>";
        exit();
    }
    $stmt->close();
} else {
    echo "<p class='error'>Không xác định tài liệu cần sửa.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa tài liệu</title>
   <style>
    * {
         box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 40px 20px;
    }

    .edit-form {
        max-width: 600px;
        margin: auto;
        background-color: #fff;
        padding: 30px 25px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .edit-form h1 {
        margin-bottom: 25px;
        color: #2c3e50;
        text-align: center;
        font-size: 24px;
    }

    .edit-form label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #34495e;
    }

    .edit-form input[type="text"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
    }

    .edit-form input[type="text"]:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 4px #3498db;
    }

    .button {
        display: inline-block;
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: none;
        border-radius: 6px;
        background-color: #3498db;
        color: white;
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

    .error-message {
        max-width: 600px;
        margin: 20px auto;
        padding: 15px;
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 6px;
        text-align: center;
        font-weight: bold;
    }

    .button-container {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .button-container .button {
        flex: 1;
    }
    </style>
</head>
<body>

<?php if ($success): ?>
    <div class="success-message">
        ✅ Cập nhật tài liệu thành công!
    </div>
<?php endif; ?>

<?php if (!empty($error)): ?>
    <div class="error-message">
        ❌ <?php echo $error; ?>
    </div>
<?php endif; ?>

<div class="edit-form">
    <h1>Chỉnh sửa tài liệu</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">

        <label>Ngành học:</label>
        <input type="text" name="nganhhoc" value="<?php echo htmlspecialchars($edit_data['nganhhoc']); ?>" required>

        <label>Năm học:</label>
        <input type="text" name="namhoc" value="<?php echo htmlspecialchars($edit_data['namhoc']); ?>" required>

        <label>Học phần:</label>
        <input type="text" name="hocphan" value="<?php echo htmlspecialchars($edit_data['hocphan']); ?>" required>

        <label>Tên file:</label>
        <input type="text" name="tenfile" value="<?php echo htmlspecialchars($edit_data['tenfile']); ?>" required>

        <label>Đường dẫn:</label>
        <input type="text" name="duongdan" value="<?php echo htmlspecialchars($edit_data['duongdan']); ?>" required>

        <div class="button-container">
            <input type="submit" name="update" value="Cập nhật" class="button">
            <a href="admin_quanli_document.php" class="button">Quay lại trang quản lí</a>
        </div>
    </form>
</div>

</body>
</html>
