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

// lấy dữ liệu từ form login
$msv_input = isset($_POST['fname']) ? $_POST['fname'] : '';
$password_input = isset($_POST['fpassword']) ? $_POST['fpassword'] : '';

// Truy vấn dữ liệu từ bảng account


// check msv and Password
if (empty($msv_input) || empty($password_input)) {
    die("Vui lòng nhập đầy đủ MSV và mật khẩu.");
}
// query
$sql = "SELECT * FROM account WHERE msv = ? and password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $msv_input, $password_input);
$stmt->execute();

$result = $stmt->get_result();
// Kiểm tra xem có dữ liệu không
if ($result->num_rows > 0) {
    // Duyệt qua các bản ghi và hiển thị
    echo "<table border='1'>";
    echo "<tr><th>MSV</th><th>Password</th></tr>"; // Tiêu đề cột
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['Msv'] . "</td><td>" . $row['Password'] . "</td></tr>";
    }
    echo "</table>";
} else {
    // Nếu không có dữ liệu khớp
    echo "Đăng nhập thất bại. Vui lòng kiểm tra lại MSV và mật khẩu.";
}

// Đóng kết nối
$conn->close();
?>
