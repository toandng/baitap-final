<?php
session_start();

// Thông tin kết nối
$servername = "localhost";
$username = "db_final";
$password = "test123";
$dbname = "baitap-final";

// Kết nối tới MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Biến lưu dữ liệu
$error = "";
$studentData = null;

// Xóa sinh viên
if (isset($_GET['MaSV'])) {
    $MaSV = $_GET['MaSV'];

    // Câu lệnh SQL để xóa sinh viên
    $sql = "DELETE FROM tbl_sinhvien WHERE `MSV` = '$MaSV'";

    if ($conn->query($sql) === TRUE) {
        $error = "Xóa sinh viên thành công!";
        header("Location: http://localhost/baitap-final/server/category/profilesv.php");
        exit();
    } else {
        $error = "Lỗi: " . $conn->error;
    }
}

// Cập nhật thông tin sinh viên
if (isset($_POST['update'])) {
    $MaSV = $_POST['MaSV'];
    $Holot = $_POST['Holot'];
    $name = $_POST['name'];
    $Malop = $_POST['Malop'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $c = $_POST['c'];
    $b = $_POST['b'];
    $a = $_POST['a'];

    // Câu lệnh SQL để cập nhật thông tin sinh viên
    $sql = "UPDATE tbl_sinhvien SET `Họ lót` = '$Holot', `Tên` = '$name', `Mã lớp` = '$Malop', `Điện thoại` = '$phone', `Email` = '$email', `c` = '$c', `b` = '$b', `a` = '$a' WHERE `Mã SV` = '$MaSV'";

    if ($conn->query($sql) === TRUE) {
        $error = "Cập nhật thông tin sinh viên thành công!";
    } else {
        $error = "Lỗi: " . $conn->error;
    }
}

// Truy vấn tất cả sinh viên
$sql = "SELECT * FROM tbl_sinhvien";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $studentData = $result->fetch_all(MYSQLI_ASSOC); // Lấy tất cả sinh viên
} else {
    $error = "Không có sinh viên nào trong hệ thống.";
}

// Truy vấn sinh viên cần sửa
if (isset($_GET['edit'])) {
    $MaSV = $_GET['edit'];
    $sql = "SELECT * FROM tbl_sinhvien WHERE `MSV` = '$MaSV'";
    $result = $conn->query($sql);
    $studentToEdit = $result->fetch_assoc();
}

// Đóng kết nối khi kết thúc
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body{
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-image: linear-gradient(rgba(64, 6, 97, 0.4), rgba(64, 6, 97, 0.4))
    }
    tbody{
        color: #fff;
    }
    /* Thay đổi màu nền của navbar khi hover */
.navbar-nav .nav-link:hover {
    background-color:rgb(20, 148, 157); 
    color: white; 
    border-radius: 5px; 
}

.navbar-nav .nav-link.active {
    background-color:rgb(41, 152, 172);  
    color: white;  
    font-weight: bold;  
    border-radius: 5px;  
}


.navbar-nav .nav-link:focus {
    background-color:rgb(13, 131, 158); 
    color: white;  
    border-radius: 5px;  
}


.navbar-light .navbar-brand:hover {
    color:rgb(9, 151, 125);  }
.btn-primary{
    width: 11%;
    height: 40px;
    margin-top: 40px;
}
</style>
<body>
    <!-- Thanh Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Quản Lý Sinh Viên</a>
            <div class="d-flex">
                <a href="../logout.php" class="btn btn-outline-light">Đăng Xuất</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <!-- Navbar bên tay trái -->
            <button class="btn btn-primary mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                    Menu
            </button>

            <!-- Offcanvas menu -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost/baitap-final/server/category/profilesv.php">Danh Sách Sinh Viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/baitap-final/server/category/student.php">Tra cứu sinh viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/baitap-final/server/category/major.php">Lớp chuyên nghành</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/baitap-final/server/category/section.php">Lớp học phần</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/baitap-final/server/category/static.php">Thống kê</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Nội dung chính bên phải -->
            <div class="col-md-9">
                <h3 class="text-center">Danh Sách Sinh Viên</h3>

                <!-- Thông báo lỗi -->
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
                <?php endif; ?>

                <!-- Nút thêm sinh viên -->
                <a href="http://localhost/baitap-final/server/category/crudsv.php" class="btn btn-success mb-3">Thêm Sinh Viên</a>

                <!-- Hiển thị thông tin sinh viên -->
                <?php if ($studentData): ?>
                    <table class="table table-bordered table-hover mt-4">
                        <thead class="table-primary">
                            <tr>
                                <th>Mã SV</th>
                                <th>Họ Lót</th>
                                <th>Tên</th>
                                <th>Mã Lớp</th>
                                <th>Điện Thoại</th>
                                <th>Email</th>
                                <th>Điểm A</th>
                                <th>Điểm B</th>
                                <th>Điểm C</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Duyệt và hiển thị tất cả thông tin sinh viên
                            foreach ($studentData as $student) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($student['MSV']) . "</td>";
                                echo "<td>" . htmlspecialchars($student['Họ lót']) . "</td>";
                                echo "<td>" . htmlspecialchars($student['Tên']) . "</td>";
                                echo "<td>" . htmlspecialchars($student['Mã lớp']) . "</td>";
                                echo "<td>" . htmlspecialchars($student['Điện thoại']) . "</td>";
                                echo "<td>" . htmlspecialchars($student['Email']) . "</td>";
                                echo "<td>" . htmlspecialchars($student['a']) . "</td>";
                                echo "<td>" . htmlspecialchars($student['b']) . "</td>";
                                echo "<td>" . htmlspecialchars($student['c']) . "</td>";
                                echo "<td>
                                    <a href='?MaSV=" . $student['MSV'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sinh viên này không?\");'>Xóa</a>
                                    <a href='update.php?edit=" . $student['MSV'] . "' class='btn btn-warning btn-sm'>Sửa</a>
                                </td>";

                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            <a href="http://localhost/baitap-final/server/pdf/export_pdf.php" class="btn btn-primary mb-3">Xuất PDF</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Lấy URL hiện tại
    const currentUrl = window.location.href;
    document.querySelectorAll('.nav-link').forEach(link => {
        // Kiểm tra nếu URL của liên kết trùng với URL hiện tại
        if (currentUrl.includes(link.href)) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
});

</script>