<?php
$current_page = basename($_SERVER['PHP_SELF']); // Lấy tên file hiện tại (vd: TinTuc.php)
?>

<nav class="menu">
    <ul> 
        <li><a href="index.php" class="<?= ($current_page == 'index.php') ? 'active' : '' ?>">TRANG CHỦ</a></li>
        <li><a href="GioiThieu.php" class="<?= ($current_page == 'GioiThieu.php') ? 'active' : '' ?>">GIỚI THIỆU</a></li>
        <li><a href="TaiLieu.php" class="<?= ($current_page == 'TaiLieu.php') ? 'active' : '' ?>">TÀI LIỆU</a></li>
        <li><a href="DeThi.php" class="<?= ($current_page == 'DeThi.php') ? 'active' : '' ?>">ĐỀ THI</a></li>
        <li><a href="TinTuc.php" class="<?= ($current_page == 'TinTuc.php') ? 'active' : '' ?>">TIN TỨC</a></li>
        <li><a href="LienHe.php" class="<?= ($current_page == 'LienHe.php') ? 'active' : '' ?>">LIÊN HỆ</a></li>
        <li><a href="chiasetailieu/chiasetailieu.php" class="<?= ($current_page == 'LienHe.php') ? 'active' : '' ?>">CHIA SẺ</a></li>
        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin'): ?>
            <li><a href="admin_quanli.php" class="<?= ($current_page == 'admin_quanli.php') ? 'active' : '' ?>">QUẢN LÝ</a></li>
        <?php endif; ?>
         
    </ul>
</nav>
