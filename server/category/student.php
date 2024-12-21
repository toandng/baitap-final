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

// Xử lý khi người dùng submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['msv'])) {
        $msv = $_POST['msv'];

        // Truy vấn dữ liệu từ bảng sinh viên dựa vào MSV
        $sql = "SELECT * FROM tbl_sinhvien WHERE `MSV` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $msv); // "s" đại diện cho string
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $studentData = $result->fetch_assoc(); // Lấy kết quả
        } else {
            $error = "Mã sinh viên không tồn tại.";
        }

        $stmt->close();
    } else {
        $error = "Vui lòng nhập mã sinh viên.";
    }
}

// Đóng kết nối khi kết thúc
$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra Cứu Thông Tin Sinh Viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    /* Thay đổi màu nền của navbar khi hover */
.navbar-nav .nav-link:hover {
    background-color: #007bff;  /* Màu nền khi hover */
    color: white;  /* Màu chữ khi hover */
    border-radius: 5px;  /* Bo góc của item khi hover */
}

/* Thay đổi màu nền của navbar khi mục được chọn (active) */
.navbar-nav .nav-link.active {
    background-color: #0056b3;  /* Màu nền khi mục được chọn */
    color: white;  /* Màu chữ khi mục được chọn */
    font-weight: bold;  /* Làm chữ đậm khi mục được chọn */
    border-radius: 5px;  /* Bo góc của item khi active */
}

/* Thêm màu khi mục được focus */
.navbar-nav .nav-link:focus {
    background-color: #0056b3;  /* Màu nền khi focus */
    color: white;  /* Màu chữ khi focus */
    border-radius: 5px;  /* Bo góc khi focus */
}

/* Thay đổi màu nền của navbar khi di chuột lên logo hoặc tên menu */
.navbar-light .navbar-brand:hover {
    color: #007bff;  /* Màu chữ của tên khi hover */
}
</style>


<body>
    <!-- Thanh Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Quản Lý Sinh Viên</a>
            <div class="d-flex">
                <a href="http://localhost/baitap-final/server/login.php" class="btn btn-outline-light">Đăng Xuất</a>
            </div>
        </div>
    </nav>
   
    <div class="container mt-4">
    <div class="row">
        <!-- Navbar bên tay trái -->
        <div class="col-md-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-light flex-column">
                <a class="navbar-brand" href="#">Menu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost/baitap-final/server/category/profilesv.php">Danh sách sinh viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tra cứu sinh viên</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="http://localhost/baitap-final/server/category/major.php">Lớp chuyên nghành</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/baitap-final/server/category/section.php">Lớp học phần</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Nội dung chính bên phải -->
        <div class="col-md-9">
            <h3 class="text-center">Tra Cứu Thông Tin Sinh Viên</h3>

            <!-- Form nhập MSV -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-4">
                <div class="mb-3">
                    <label for="msv" class="form-label">Mã Sinh Viên</label>
                    <input type="text" name="msv" id="msv" class="form-control" value="<?php echo isset($msv) ? htmlspecialchars($msv) : ''; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
            </form>

            <!-- Thông báo lỗi -->
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
            <?php endif; ?>

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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars($studentData['MSV']); ?></td>
                            <td><?php echo htmlspecialchars($studentData['Họ lót']); ?></td>
                            <td><?php echo htmlspecialchars($studentData['Tên']); ?></td>
                            <td><?php echo htmlspecialchars($studentData['Mã lớp']); ?></td>
                            <td><?php echo htmlspecialchars($studentData['Điện thoại']); ?></td>
                            <td><?php echo htmlspecialchars($studentData['Email']); ?></td>
                            <td><?php echo htmlspecialchars($studentData['a']); ?></td>
                            <td><?php echo htmlspecialchars($studentData['b']); ?></td>
                            <td><?php echo htmlspecialchars($studentData['c']); ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
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

    // Lặp qua tất cả các liên kết trong menu
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