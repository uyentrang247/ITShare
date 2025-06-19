<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm video</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .container { 
            padding: 40px; 
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px; 
             font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
             color: red;
        }

        form label {
            display: block;
            margin: 15px 0 5px;
            font-weight: 500;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #007bff;
            background-color: #fff;
            outline: none;
        }

        button {
            margin-top: 20px;
            padding: 12px;
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-btn {
            margin-top: 10px;
            background-color: #007bff;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 15px;
        }

        select optgroup {
            font-weight: bold;
        }
    </style>
</head>
<body>
 
<div class="container">
    <h2>Thêm mới video học tập</h2>
    <form method="post" action="add_xulivideo.php">
        <label for="hocphan">Học phần:</label>
        <select name="hocphan" id="hocphan" required>
            <optgroup label="Năm 1">
                <option value="giaitich">Giải tích</option>
                <option value="daisotuyentinh">Đại số tuyến tính</option>
                <option value="toanlogic">Toán logic</option>
                <option value="laptrinhcoban">Lập trình cơ bản</option>
                <option value="nmtt">Nhập môn Thuật toán</option>
                <option value="phuongphaptinh">Phương pháp tính</option>
                <option value="csdlSQL">Hệ quản trị cơ sở dữ liệu SQL</option>
            </optgroup>
            <optgroup label="Năm 2">
                <option value="ktlt">Kỹ thuật lập trình</option>
                <option value="ctdlgt">Cấu trúc dữ liệu và giải thuật</option>
                <option value="toanroirac">Toán rời rạc</option>
                <option value="lthdt">Lập trình hướng đối tượng</option>
                <option value="xacsuatthongke">Xác suất thống kê</option>
                <option value="csdl">Cơ sở dữ liệu</option>
                <option value="ltdesktop">Lập trình Desktop</option>
            </optgroup>
        </select>

        <label for="tenvideo">Tên video:</label>
        <input type="text" name="tieude" id="tieude" required autocomplete="off">

        <label for="duongdan">Đường dẫn video (link YouTube):</label>
        <input type="text" name="duongdan" id="duongdan" required>

        <button type="submit">Thêm video</button>
    </form>
    
    <form action="admin_quanli_video.php" method="post">
        <button type="submit" class="back-btn">Quay lại trang chủ</button>
    </form>
</div>

</body>
</html>
