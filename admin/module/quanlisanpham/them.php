
<h3 class="section-header" style="color: black;">Thêm sản phẩm</h3>
<table class="custom-table" border="1">
    <form class="form-container" method="POST" action="module/quanlisanpham/xuly.php" enctype="multipart/form-data" >
        <tr>
            <td>Tên sản phẩm</td>
            <td><input class="input-field" type="text" name="nameproduct" required ></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input class="input-field" type="text" name="productcode" required></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input class="input-field" type="text" name="priceproduct" required></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input class="input-field" type="text" name="quantity" required></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea name="content" id="" cols="30" rows="10" required></textarea></td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><textarea name="summary" id="" cols="30" rows="10" required></textarea></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm</td>
            <td><input class="input-field" type="file" name="pictureproduct"></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
            <select name="category" id="">
            <?php
                $sql_namecategory="SELECT * FROM tbl_category ORDER BY id_category DESC";
                $query_category=mysqli_query($mysqli,$sql_namecategory);
                while($row_category = mysqli_fetch_array($query_category)){
             ?>   
              <option value="<?php echo $row_category['id_category'] ?>"><?php echo $row_category['namecategory'] ?></option>
              <?php
                }
              ?>
            </select></td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td><select name="status" id="">
              <option value="1">Kích hoạt</option>
              <option value="0">Ẩn</option>
            </select></td>
        </tr>
        <tr>
            <td colspan="2"><input class="submit-btn" type="submit" name="addproduct" value="Thêm sản phẩm"></td>
        </tr>
    </form>
</table>