<?php
$sql_product = "SELECT * FROM tbl_product,tbl_category  WHERE tbl_product.id_category = tbl_category.id_category AND tbl_product.id_product= '$_GET[idproduct]' LIMIT 1";
$query_product = mysqli_query($mysqli, $sql_product);
?>
<div class="detail-product">
    <div class="grid">
        <h1 detail-product__heading>CHI TIẾT SẢN PHẨM</h1>
        <div class="grid__row">
            <?php
            while ($row_product = mysqli_fetch_array($query_product)) {
                ?>
            <div class="grid__column-4">
                <img class="detail-product__img"
                    src="admin/module/quanlisanpham/upload/<?php echo $row_product['picture'] ?>" alt="Ảnh Sản Phẩm">
            </div>
            <div class="grid__column-8">
                <form action="view/menu/addcart.php?idproduct=<?php echo $row_product['id_product'] ?>" method="POST">
                    <div class="">
                        <h1 class="detail-product__heading">
                            <?php echo $row_product['nameproduct'] ?>
                        </h1>
                        <p class="detail-product-desreption">Mã sản phẩm:
                            <?php echo $row_product['productcode'] ?>
                        </p>
                        <p class="detail-product-desreption">Tóm tắt :
                            <?php echo $row_product['summary'] ?>
                        </p>
                        <p class="detail-product-desreption">Mô tả:
                            <?php echo $row_product['content'] ?>
                        </p>
                        <p class="detail-product-price">Giá sản phẩm:
                            <?php echo $row_product['priceproduct'] ?>VNĐ
                        </p>
                        <button class="btn btn--primary" type="submit" name="addcart">
                            <i class="fa-solid fa-cart-plus"></i>
                            Thêm giỏ hàng</button>
                    </div>
                </form>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>