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

$error = "";
$studentToEdit = null;

// Kiểm tra xem có tham số 'edit' trong URL không
if (isset($_GET['edit'])) {
    $MaSV = $_GET['edit'];

    // Lấy thông tin sinh viên từ cơ sở dữ liệu
    $sql = "SELECT * FROM tbl_sinhvien WHERE `MSV` = '$MaSV'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $studentToEdit = $result->fetch_assoc();
    } else {
        $error = "Không tìm thấy sinh viên với Mã SV này!";
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

    // Cập nhật thông tin vào cơ sở dữ liệu
    $sql = "UPDATE tbl_sinhvien SET `Họ lót` = '$Holot', `Tên` = '$name', `Mã lớp` = '$Malop', `Điện thoại` = '$phone', `Email` = '$email', `c` = '$c', `b` = '$b', `a` = '$a' WHERE `MSV` = '$MaSV'";

    if ($conn->query($sql) === TRUE) {
        $error = "Cập nhật thông tin sinh viên thành công!";
        header("Location: http://localhost/baitap-final/server/category/profilesv.php");
        exit();
    } else {
        $error = "Lỗi: " . $conn->error;
    }
}

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
<body>
    <!-- Thanh Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Quản Lý Sinh Viên</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="text-center">Cập Nhật Thông Tin Sinh Viên</h3>

        <!-- Thông báo lỗi -->
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if ($studentToEdit): ?>
            <!-- Form cập nhật thông tin sinh viên -->
            <form method="POST">
                <input type="hidden" name="MaSV" value="<?php echo $studentToEdit['MSV']; ?>">

                <div class="mb-3">
                    <label for="Holot" class="form-label">Họ lót</label>
                    <input type="text" class="form-control" id="Holot" name="Holot" value="<?php echo $studentToEdit['Họ lót']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tên</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $studentToEdit['Tên']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Malop" class="form-label">Mã Lớp</label>
                    <input type="text" class="form-control" id="Malop" name="Malop" value="<?php echo $studentToEdit['Mã lớp']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $studentToEdit['Điện thoại']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $studentToEdit['Email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="a" class="form-label">Điểm A</label>
                    <input type="number" class="form-control" id="a" name="a" value="<?php echo $studentToEdit['a']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="b" class="form-label">Điểm B</label>
                    <input type="number" class="form-control" id="b" name="b" value="<?php echo $studentToEdit['b']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="c" class="form-label">Điểm C</label>
                    <input type="number" class="form-control" id="c" name="c" value="<?php echo $studentToEdit['c']; ?>" required>
                </div>

                <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
            </form>
        <?php else: ?>
            <p>Không tìm thấy thông tin sinh viên cần sửa.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
