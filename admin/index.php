<?php
session_start();
if (isset($_SESSION['role']) && ($_SESSION['role']) == 1) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="../admin/css/style.css">
        <link rel="stylesheet" href="../assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
    </head>

    <body>
        <div class="grid">
            <?php
            include('config/config.php');
            include("module/header.php");
            include("module/menu.php");
            include("module/main.php");
            include("module/footer.php");
            ?>
        </div>
    </body>

    </html>
<?php
} else {
    header('Location:login.php');
}
if(isset($_GET['logout'])){
    unset($_SESSION['role']);
    unset($_SESSION['fullname']);
    header('Location:login.php');
}
?>