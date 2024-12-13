<?php
$servername = "localhost";
$username = "db_final";
$password = "test123";
$dbname = "baitap-final"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form login
$msv_input = isset($_POST['fname']) ? $_POST['fname'] : '';
$password_input = isset($_POST['fpassword']) ? $_POST['fpassword'] : '';

// Kiểm tra xem MSV và mật khẩu có được nhập không
if (empty($msv_input) || empty($password_input)) {
    die("Vui lòng nhập đầy đủ MSV và mật khẩu.");
}

// Truy vấn để kiểm tra thông tin đăng nhập
$sql = "SELECT * FROM account WHERE Msv = ? AND Password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $msv_input, $password_input);
$stmt->execute();
$result = $stmt->get_result();

// Kiểm tra thông tin tài khoản
if ($result->num_rows > 0) {
    $account = $result->fetch_assoc();
    $role = $account['role']; // Lấy giá trị role từ cột 'role'

    // Phân quyền
    if ($role == 0) {
        // Nếu là admin, chuyển hướng đến trang quản lý admin
        header("Location: http://localhost/baitap-final/server/category/profilesv.php");
        exit();
    } else if ($role == 1) {
        // Nếu là sinh viên, chuyển hướng đến trang sinh viên
        header("Location: http://localhost/baitap-final/server/category/student.php");
        exit();
    } else {
        echo "Vai trò không hợp lệ.";
    }
} else {
    // Nếu đăng nhập thất bại
    echo "Đăng nhập thất bại. Vui lòng kiểm tra lại MSV và mật khẩu.";
}

// Đóng statement
$stmt->close();

// Đóng kết nối
$conn->close();
?>
