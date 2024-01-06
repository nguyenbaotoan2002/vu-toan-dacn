<div class="navbar-admin ">
    <i class="fa-solid fa-user navbar-admin-icon"></i>
    <?php if(isset($_SESSION['role'])){
    echo $_SESSION['username'];
}

?>
    <a class="admin-logout" href="index.php?logout">Đăng xuất</a>
</div>
