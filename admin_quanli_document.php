<?php
require('site.php');
load_top();
load_menu();
load_header();
?>

<?php
include(__DIR__ . '/assets/database/dbungdung_tailieu.php');

// Xử lý xóa
if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $id_xoa = (int)$_GET['delete_id'];
    $sql_xoa = "DELETE FROM tailieu WHERE id = ?";
    $stmt = $conn->prepare($sql_xoa);
    if ($stmt) {
        $stmt->bind_param("i", $id_xoa);
        if ($stmt->execute()) {
            $stmt->close();
            // Quay lại trang hiện tại sau khi xóa
            $trang = isset($_GET['trang']) ? (int)$_GET['trang'] : 1;
            header("Location: admin_quanli_document.php?trang=$trang&xoa=1");
            exit();
        } else {
            echo "Lỗi khi xóa: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Lỗi chuẩn bị câu lệnh: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $nganhhoc = $_POST['nganhhoc'];
    $namhoc = $_POST['namhoc'];
    $hocphan = $_POST['hocphan'];
    $tenfile = $_POST['tenfile'];
    $duongdan = $_POST['duongdan'];

    // Kiểm tra dữ liệu đầu vào
    if (empty($nganhhoc) || empty($namhoc) || empty($hocphan) || empty($tenfile) || empty($duongdan)) {
        echo "Vui lòng điền đầy đủ thông tin.";
        exit();
    }

    $sql_update = "UPDATE tailieu SET nganhhoc=?, namhoc=?, hocphan=?, tenfile=?, duongdan=? WHERE id=?";
    $stmt = $conn->prepare($sql_update);
    if ($stmt) {
        $stmt->bind_param("sssssi", $nganhhoc, $namhoc, $hocphan, $tenfile, $duongdan, $id);
        if ($stmt->execute()) {
            header("Location: admin_quanli_document.php?trang=$trang");
            exit();
        } else {
            echo "Lỗi khi cập nhật: " . $stmt->error;
        }
        $stmt->close();
    } else {
        die("Lỗi chuẩn bị câu lệnh: " . $conn->error);
    }
}

// Thiết lập số dòng mỗi trang
$so_dong_moi_trang = 30;

// Lấy trang hiện tại từ URL, mặc định là 1
$trang_hien_tai = isset($_GET['trang']) && is_numeric($_GET['trang']) ? (int)$_GET['trang'] : 1;
if ($trang_hien_tai < 1) $trang_hien_tai = 1;

$bat_dau = ($trang_hien_tai - 1) * $so_dong_moi_trang;

// Đếm tổng số dòng
$truy_van_dem = "SELECT COUNT(*) AS tong_so FROM tailieu";
$ket_qua_dem = $conn->query($truy_van_dem);
$tong_so_dong = $ket_qua_dem ? $ket_qua_dem->fetch_assoc()['tong_so'] : 0;
$tong_so_trang = ceil($tong_so_dong / $so_dong_moi_trang);

// Truy vấn dữ liệu theo phân trang
$truy_van = "SELECT * FROM tailieu ORDER BY id ASC LIMIT ?, ?";
$stmt = $conn->prepare($truy_van);
if ($stmt) {
    $stmt->bind_param("ii", $bat_dau, $so_dong_moi_trang);
    $stmt->execute();
    $ket_qua = $stmt->get_result();
} else {
    die("Lỗi chuẩn bị câu lệnh: " . $conn->error);
}
?>

<h1>Quản lý tài liệu</h1>
<?php
if (isset($_GET['xoa']) && $_GET['xoa'] == 1) {
    echo "<p style='color: blue; text-align: center;'>Đã xóa thành công tài liệu!</p>";
}
?>

<div class="add-button">
    <a href="add_tailieu.php">Thêm tài liệu</a>
    <a href="admin_quanli_videotl.php">Quản lí video</a> 
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Ngành học</th>
        <th>Năm học</th>
        <th>Học phần</th>
        <th>Tên file</th>
        <th>Đường dẫn</th>
        <th>Thao tác</th>
    </tr>
    <?php if ($ket_qua->num_rows > 0): ?>
        <?php while ($dong = $ket_qua->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($dong['id']) ?></td>
                <td><?= htmlspecialchars($dong['nganhhoc']) ?></td>
                <td><?= htmlspecialchars($dong['namhoc']) ?></td>
                <td><?= htmlspecialchars($dong['hocphan']) ?></td>
                <td><?= htmlspecialchars($dong['tenfile']) ?></td>
                <td><a href="/myweb/<?= htmlspecialchars($dong['duongdan']) ?>" target="_blank">Xem</a></td>
                <td class="action-buttons">
                    <a href="admin_edit_document.php?edit_id=<?= $dong['id'] ?>&trang=<?= $trang_hien_tai ?>">Sửa</a>
                    <a href="?delete_id=<?= $dong['id'] ?>&trang=<?= $trang_hien_tai ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="7">Không có dữ liệu</td></tr>
    <?php endif; ?>
</table>

<!-- Phân trang -->
<?php if ($tong_so_trang > 1): ?>
    <div class="phan-trang">
        <?php for ($i = 1; $i <= $tong_so_trang; $i++): ?>
            <?php if ($i == $trang_hien_tai): ?>
                <strong><?= $i ?></strong>
            <?php else: ?>
                <a href="?trang=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
<?php endif; ?>

</body>
</html>