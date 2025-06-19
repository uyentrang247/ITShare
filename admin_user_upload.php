<?php
require('site.php');
load_top();
load_menu();
load_header();
?>
<?php
include(__DIR__ . '/assets/database/dbungdung_tailieu.php');

// ===== XỬ LÝ XÓA =====
if (isset($_GET['xoa_id'])) {
    $ma_tai_lieu = (int)$_GET['xoa_id'];

    $truy_van = "SELECT duongdan FROM tailieu_users WHERE id = $ma_tai_lieu";
    $ket_qua = $conn->query($truy_van);
    if ($ket_qua->num_rows == 1) {
        $dong = $ket_qua->fetch_assoc();
        $duong_dan_file = $dong['duongdan'];

        $xoa_sql = "DELETE FROM tailieu_users WHERE id = $ma_tai_lieu";
        if ($conn->query($xoa_sql) === TRUE) {
            echo "<script>alert('✅ Đã xóa tài liệu thành công!'); window.location.href='admin_user_upload.php';</script>";
            exit();
        } else {
            echo "❌ Lỗi khi xóa tài liệu: " . $conn->error;
        }
    } else {
        echo "❌ Không tìm thấy tài liệu.";
    }
}

$so_tai_lieu_moi_trang = 20;
$trang_hien_tai = isset($_GET['trang']) ? (int)$_GET['trang'] : 1;
if ($trang_hien_tai < 1) {
    $trang_hien_tai = 1;
}

$bat_dau = ($trang_hien_tai - 1) * $so_tai_lieu_moi_trang;

$sql_tong = "SELECT COUNT(*) AS tong FROM tailieu_users";
$ket_qua_tong = $conn->query($sql_tong);
$tong_so_tai_lieu = $ket_qua_tong->fetch_assoc()['tong'];
$tong_so_trang = ceil($tong_so_tai_lieu / $so_tai_lieu_moi_trang);

// Make sure current page is not out of bounds
if ($trang_hien_tai > $tong_so_trang && $tong_so_trang > 0) {
    $trang_hien_tai = $tong_so_trang;
    $bat_dau = ($trang_hien_tai - 1) * $so_tai_lieu_moi_trang; //Recalculate start
}


$sql = "SELECT * FROM tailieu_users ORDER BY ngaytao DESC LIMIT $bat_dau, $so_tai_lieu_moi_trang";
$ket_qua = $conn->query($sql);
?>

    <h2>📘 Danh sách tài liệu được chia sẻ</h2>

    <?php if ($ket_qua->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Ngành học</th>
                <th>Năm học</th>
                <th>Học phần</th>
                <th>Tên tài liệu</th>
                <th>File</th>
                <th>Ngày tải</th>
                <th>Thao tác</th>
            </tr>
            <?php while ($dong = $ket_qua->fetch_assoc()): ?>
                <tr>
                    <td><?= $dong['id'] ?></td>
                    <td><?= $dong['nganhhoc'] ?></td>
                    <td><?= $dong['namhoc'] ?></td>
                    <td><?= $dong['hocphan'] ?></td>
                    <td><?= $dong['tenfile'] ?></td>
                    <td><a href="/myweb/chiasetailieu/<?= htmlspecialchars($dong['duongdan']) ?>" target="_blank">Xem</a></td>
                    <td><?= $dong['ngaytao'] ?></td>
                    <td><a href="?xoa_id=<?= $dong['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">🗑️ Xóa</a></td>
                </tr>
            <?php endwhile; ?>
        </table>

        <div style="margin-top: 20px;">
            <?php if ($tong_so_trang > 1): ?>
                <?php for ($i = 1; $i <= $tong_so_trang; $i++): ?>
                    <a class="trang" href="?trang=<?= $i ?>" style="<?= $i == $trang_hien_tai ? 'font-weight:bold;' : '' ?>"><?= $i ?></a>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <p>Không có tài liệu nào.</p>
    <?php endif; ?>



<?php $conn->close(); ?>
