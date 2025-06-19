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
    <form method="post" action="add_videotl.php">
        <label for="nganhhoc">Ngành học:</label>
        <select name="nganhhoc" id="nganhhoc" required>
            <option value="cntt">Công nghệ thông tin</option>
        </select>

        <label for="hocphan">Học phần:</label>
        <select name="hocphan" id="hocphan" required>
            <optgroup label="Năm 1">
                <option value="giaitich">Giải tích</option>
                <option value="daisotuyentinh">Đại số tuyến tính</option>
                <option value="toanlogic">Toán logic</option>
                <option value="laptrinhcoban">Lập trình cơ bản</option>
                <option value="tienganh1">Tiếng Anh 1</option>
                <option value="triet">Triết học Mác-Lênin</option>
                <option value="kinhtechinhtri">Kinh tế chính trị</option>
                <option value="pldc">Pháp luật đại cương</option>
                <option value="kynanggiaotiep">Kỹ năng giao tiếp</option>
                <option value="tienganh2">Tiếng Anh 2</option>
                <option value="nhapmonthuattoan">Nhập môn Thuật toán</option>
                <option value="phuongphaptinh">Phương pháp tính</option>
                <option value="hequantricsdl">Hệ quản trị cơ sở dữ liệu SQL</option>
            </optgroup>
            <optgroup label="Năm 2">
                <option value="chunghiaxahoikhoahoc">Chủ nghĩa xã hội khoa học</option>
                <option value="lthuongdoituong">Lập trình hướng đối tượng</option>
                <option value="xacsuatthongke">Xác suất thống kê</option>
                <option value="toanroirac">Toán rời rạc</option>
                <option value="kythuatlaptrinh">Kỹ thuật lập trình</option>
                <option value="nhapmonmang">Nhập môn mạng máy tính</option>
                <option value="ltdesktop">Lập trình Desktop</option>
                <option value="csdl">Nhập môn cơ sở dữ liệu</option>
                <option value="laptrinhweb">Lập trình ứng dụng web</option>
                <option value="lichsudang">Lịch sử Đảng</option>
                <option value="cautrucdulieu">Cấu trúc dữ liệu và giải thuật</option>
            </optgroup>
        </select>

        <label for="tenvideo">Tên video:</label>
        <input type="text" name="tenvideo" id="tenvideo" required autocomplete="off">

        <label for="duongdan">Đường dẫn video (link YouTube):</label>
        <input type="text" name="duongdan" id="duongdan" required>

        <button type="submit">Thêm video</button>
    </form>
    
    <form action="admin_quanli_document.php" method="get">
        <button type="submit" class="back-btn">Quay lại trang quản lí</button>
    </form>
</div>

</body>
</html>