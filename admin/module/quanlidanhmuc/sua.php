<?php
$sql_sua_danhmucsp = "SELECT * FROM tbl_category WHERE id_category = '$_GET[idcategory]' LIMIT 1";
$query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);
?>
<p class="section-header">Sửa danh mục sản phẩm</p>
<table class="custom-table" border="1">
    <form class="form-container" method="POST"
        action="module/quanlidanhmuc/xuly.php?idcategory=<?php echo $_GET['idcategory'] ?>">
        <?php
        while ($row = mysqli_fetch_array($query_sua_danhmucsp)) {


            ?>
            <tr>
                <td>Tên danh mục</td>
                <td><input class="input-field" value="<?php echo $row['namecategory'] ?>" type="text" name="namecategory">
                </td>
            </tr>
            <tr>
                <td>Thứ tự</td>
                <td><input class="input-field" value="<?php echo $row['serial'] ?>" type="text" name="serial"></td>
            </tr>
            <tr>
                <td colspan="2"><input class="submit-btn" type="submit" name="editcategory" value="Sửa danh mục sản phẩm">
                </td>
            </tr>
            <?php
        }
        ?>
    </form>
</table>