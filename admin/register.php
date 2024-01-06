<?php
include('config/config.php');
session_start();

if (isset($_POST['register'])) {
    $fullname = $_POST['full-name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Kiểm tra mật khẩu và xác nhận mật khẩu
    if ($password != $confirmPassword) {
        echo "Mật khẩu và xác nhận mật khẩu không khớp.";
    } else {
        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Thực hiện truy vấn SQL để chèn dữ liệu
        $sql = "INSERT INTO tbl_admin (fullname, username, password, role) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($mysqli, $sql);

        // Gán giá trị cho các tham số
        $role = 0;  // Giả sử mặc định là người dùng quản trị, bạn có thể điều chỉnh nếu cần
        mysqli_stmt_bind_param($stmt, "sssi", $fullname, $username, $hashedPassword, $role);
        mysqli_stmt_execute($stmt);

        // Đóng Prepared Statement
        mysqli_stmt_close($stmt);

        $message = "Đăng ký thành công!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../assets/css/register.css">
</head>

<body>

    <div class="wrapper-container">
        <h2>Đăng Ký Tài Khoản</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full-name" required>
            </div>
            <div class="form-group">
                <label for="register-username">Username:</label>
                <input type="email" id="register-username" name="username" required>
            </div>
            <div class="form-group">
                <label for="register-password">Password:</label>
                <input type="password" id="register-password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="register">Đăng ký</button>
            </div>
        </form>
    </div>
</body>

</html>
 <!-- Script để hiển thị thông báo đăng ký thành công -->
<script>
    // PHP variable to JavaScript variable
    var message = "<?php echo $message; ?>";
    
    // Kiểm tra xem message có giá trị không và hiển thị alert
    if (message) {
        alert(message);
        window.location.href = 'index.php';
    }
</script>
