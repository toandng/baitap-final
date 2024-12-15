<?php
// Bật hiển thị lỗi để dễ debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Thông tin kết nối cơ sở dữ liệu
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

// Bắt đầu session
session_start();

// Lấy dữ liệu từ form login
$msv_input = isset($_POST['msv']) ? trim($_POST['msv']) : '';
$password_input = isset($_POST['password']) ? trim($_POST['password']) : '';

// Kiểm tra xem MSV và mật khẩu có được nhập không
if (empty($msv_input) || empty($password_input)) {
    die("Vui lòng nhập đầy đủ MSV và mật khẩu.");
}

// Truy vấn để kiểm tra thông tin đăng nhập
$sql = "SELECT * FROM accounts WHERE MSV = ? AND Password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $msv_input, $password_input); // Bind giá trị msv và password
$stmt->execute();
$result = $stmt->get_result();

// Kiểm tra kết quả
if ($result->num_rows > 0) {
    $account = $result->fetch_assoc(); // Lấy dữ liệu tài khoản
    $role = $account['role']; // Lấy vai trò từ cột 'role'

    // Lấy thông tin sinh viên từ bảng tbl_sinhvien
    if ($role == 1) {  // Nếu là sinh viên, lấy thông tin sinh viên từ bảng tbl_sinhvien
        $sql_student = "SELECT * FROM tbl_sinhvien WHERE MSV = ?";
        $stmt_student = $conn->prepare($sql_student);
        $stmt_student->bind_param('s', $msv_input);
        $stmt_student->execute();
        $result_student = $stmt_student->get_result();

        if ($result_student->num_rows > 0) {
            $student = $result_student->fetch_assoc(); // Lấy thông tin sinh viên

            // Lưu thông tin sinh viên vào session
            $_SESSION['student'] = $student;

            // Sau khi hiển thị thông tin, chuyển hướng đến trang sinh viên
            header("Location: /baitap-final/server/products/infosv.php");
            exit();
        } else {
            echo "Không tìm thấy thông tin sinh viên.";
        }

        $stmt_student->close();
    } else {
        header("Location: /baitap-final/server/category/profilesv.php");
        exit();
    }
} else {
    // Đăng nhập thất bại
    echo "Đăng nhập thất bại. Vui lòng kiểm tra lại MSV và mật khẩu.";
}

// Đóng statement và kết nối
$stmt->close();
$conn->close();
?>
