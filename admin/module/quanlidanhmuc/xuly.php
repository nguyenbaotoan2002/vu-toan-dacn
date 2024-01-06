<?php
include('../../config/config.php');
$namecategory = $_POST['namecategory'];
$serial = $_POST['serial'];
if (isset($_POST['addcategory'])) {
    $sql_them = "INSERT INTO tbl_category(namecategory,serial) VALUE('".$namecategory."','".$serial."')";
    mysqli_query($mysqli, $sql_them);
    header('Location:../../index.php?action=quanlidanhmucsanpham&query=add');
    exit();
}elseif(isset($_POST['editcategory'])){
    $sql_them = "UPDATE tbl_category SET namecategory='".$namecategory."', serial='".$seria."' WHERE id_category='$_GET[idcategory]'";
    mysqli_query($mysqli, $sql_them);
    header('Location:../../index.php?action=quanlidanhmucsanpham&query=add');
    exit();

}elseif(isset($_GET['idcategory'])){
    $id = $_GET['idcategory'];
    $sql_xoa="DELETE FROM tbl_category WHERE id_category = '".$id."'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlidanhmucsanpham&query=add');
}
?>
