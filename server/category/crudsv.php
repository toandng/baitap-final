<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "db_final";
$password = "test123";
$dbname = "baitap-final";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thêm sinh viên
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $MaSV = $_POST['MaSV'];
    $Holot = $_POST['Holot'];
    $name = $_POST['name'];
    $Malop = $_POST['Malop'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $c = $_POST['c'];
    $b = $_POST['b'];
    $a = $_POST['a'];

    // Câu lệnh SQL để thêm sinh viên vào bảng
    $sql = "INSERT INTO tbl_sinhvien (`Mã SV`, `Họ lót`, `Tên`, `Mã lớp`, `Điện thoại`, `Email`, `c`, `b`, `a`)
            VALUES ('$MaSV', '$Holot', '$name', '$Malop', '$phone', '$email', '$c', '$b', '$a')";

    if ($conn->query($sql) === TRUE) {
        header("Location: http://localhost/baitap-final/server/category/profilesv.php");
        exit();

    } else {
        echo "Lỗi: " . $conn->error;
    }
}


// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Thêm Sinh Viên</title>
</head>
<body>
    <!-- Thanh Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Quản Lý Sinh Viên</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h3 class="text-center mb-4">Thêm Thông Tin Sinh Viên</h3>

        <!-- Form để thêm sinh viên -->
        <form method="POST">
            <div class="mb-3">
                <label for="MaSV" class="form-label">Mã Sinh Viên</label>
                <input type="text" class="form-control" id="MaSV" name="MaSV" required>
            </div>
            <div class="mb-3">
                <label for="Holot" class="form-label">Họ Lót</label>
                <input type="text" class="form-control" id="Holot" name="Holot" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="Malop" class="form-label">Mã Lớp</label>
                <input type="text" class="form-control" id="Malop" name="Malop" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Điện Thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="c" class="form-label">Điểm C</label>
                <input type="text" class="form-control" id="c" name="c">
            </div>
            <div class="mb-3">
                <label for="b" class="form-label">Điểm B</label>
                <input type="text" class="form-control" id="b" name="b">
            </div>
            <div class="mb-3">
                <label for="a" class="form-label">Điểm A</label>
                <input type="text" class="form-control" id="a" name="a">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Thêm Sinh Viên</button>
            </div>
        </form>
    </div>

    <!-- Thêm Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

