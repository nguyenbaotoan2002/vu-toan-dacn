<?php
$sql_lietke_danhmucsp = "SELECT * FROM tbl_category ORDER BY serial ASC";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>
<h3 class="section-header">Danh mục sản phẩm</h3>
<table class="custom-table list-table" border="1">
    <form method="POST" action="module/quanlidanhmuc/xuly.php">
        <tr>
            <th>Id</th>
            <th>Tên danh mục</th>
            <th>Quản lý chức năng</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
            $i++;
            ?>
            <tr>
                <td>
                    <?php echo $i ?>
                </td>
                <td>
                    <?php echo $row['namecategory'] ?>
                </td>
                <td>
                    <a href="module/quanlidanhmuc/xuly.php?idcategory=<?php echo $row['id_category'] ?>">Xóa</a> |
                    <a href="?action=quanlidanhmucsanpham&query=edit&idcategory=<?php echo $row['id_category'] ?>">Sửa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </form>
</table>