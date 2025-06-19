<?php
session_start(); 
 
include(__DIR__ . '/assets/database/dbungdung_tailieu.php');
 

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Xây dựng câu lệnh truy vấn
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);   

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Lưu thông tin người dùng vào session
        $_SESSION['username'] = $user['username'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['email'] = $user['email'];

       
        // Lưu Cookie (ghi nhớ 7 ngày)
        setcookie("username", $user['username'], time() + (86400 * 7), "/");

        // Chuyển hướng đến trang chính
        header("Location: index.php");
        exit();
    } else {
        $message = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if ($password != $repassword) {
        $message = "Mật khẩu không khớp!";
    } else {
        $checkUser = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($checkUser);

        if ($result->num_rows > 0) {
            $message = "Tên đăng nhập đã tồn tại!";
        } else {
            $sql = "INSERT INTO users (username, fullname, email, password) 
                    VALUES ('$username', '$fullname', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                $message = "Đăng ký thành công!";
            } else {
                $message = "Lỗi: " . $conn->error;
            }
        }
    }
}

// Đóng kết nối
mysqli_close($conn);
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng ký & Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dondangky.css">
    <script>
        function showForm(id) {
            document.getElementById('loginForm').style.display = id === 'loginForm' ? 'block' : 'none';
            document.getElementById('registerForm').style.display = id === 'registerForm' ? 'block' : 'none';

            document.getElementById('logBtn').classList.toggle('active', id === 'loginForm');
            document.getElementById('regBtn').classList.toggle('active', id === 'registerForm');
        }
    </script>
</head>

<body>
<div class="container">
    <div class="tab">
        <button id="logBtn" class="active" onclick="showForm('loginForm')">Đăng nhập</button>
        <button id="regBtn" onclick="showForm('registerForm')">Đăng ký</button>
    </div>

    <form id="loginForm" method="post" style="display:block;" action="">
        <h2>Đăng nhập</h2>
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <button type="submit" name="login">Đăng nhập</button>
        <div style="text-align: right; margin-top: 10px;">
    </div>
    </form>

    <form id="registerForm" method="post" style="display:none;">
        <h2>Đăng ký</h2>
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
        <input type="text" name="fullname" placeholder="Họ và tên" required>
        <input type="email" name="email" placeholder="Địa chỉ email" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" required>  
        <button type="submit" name="register">Đăng ký</button>
    </form>
    
    <div class="message"><?php echo $message; ?></div>
</div>
</body>
</html>

