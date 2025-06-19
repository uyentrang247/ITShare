<?php 
session_start();

$current_page = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION['username']) && $current_page != 'dondangky.php') {
    header('Location: dondangky.php');
    exit();
}

$user = $_SESSION['username'] ?? null;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Ứng dụng chia sẻ tài nguyên học tập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Đường dẫn CSS cần đúng tương đối với file gọi top.php --> 
    <link rel="stylesheet" href="/myweb/assets/css/style.css">
    <link rel="stylesheet" href="/myweb/assets/css/trangchu.css">
    <link rel="stylesheet" href="/myweb/assets/css/tintuc.css">
    <link rel="stylesheet" href="/myweb/assets/css/gioithieu.css">
    <link rel="stylesheet" href="/myweb/assets/css/lienhe.css">
    <link rel="stylesheet" href="/myweb/assets/css/dethi.css">
    <link rel="stylesheet" href="/myweb/assets/css/quanli.css">
    <link rel="stylesheet" href="/myweb/assets/css/quanlidethi.css">
    

     
</head> 

<body>
    <div class="top-bar">
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" placeholder="Tìm kiếm">
        </div>
        <?php if (isset($_SESSION['fullname'])): ?>
            <span>Chào, <strong><?= $_SESSION['fullname'] ?></strong> | <a href="logout.php">Đăng xuất</a></span>
        <?php else: ?>
            <a href="dondangky.php">Đăng nhập / Đăng ký</a>
        <?php endif; ?>
    </div>
</body>