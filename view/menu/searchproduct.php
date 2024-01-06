



<script>
    var phanTuDangClick = null; // Biến lưu trạng thái click trước đó
    // Kiểm tra xem localStorage có được hỗ trợ không
    function isLocalStorageSupported() {
        try {
            localStorage.setItem('test', 'test');
            localStorage.removeItem('test');
            return true;
        } catch (e) {
            return false;
        }
    }
    // Hàm JavaScript để xử lý sự kiện click
    function thayDoiMau(element) {
        // Nếu phần tử hiện tại không phải là phần tử được click trước đó
        if (element !== phanTuDangClick) {
            // Kiểm tra xem localStorage có được hỗ trợ không
            if (isLocalStorageSupported()) {
                // Loại bỏ lớp 'clicked' từ phần tử trước đó (nếu có)
                if (phanTuDangClick !== null) {
                    phanTuDangClick.classList.remove("clicked");
                }
                // Thêm lớp 'clicked' vào phần tử được click
                element.classList.add("clicked");
                // Cập nhật phần tử đang click
                phanTuDangClick = element;
                // Lưu trạng thái vào localStorage
                localStorage.setItem("clickedCategory", element.textContent);
            } else {
                // Nếu localStorage không được hỗ trợ, bạn có thể xử lý một cách khác ở đây.
                console.log('localStorage is not supported.');
            }
        }
    }
    // Khôi phục trạng thái từ localStorage khi trang được load
    window.onload = function () {
        if (isLocalStorageSupported()) {
            var clickedCategory = localStorage.getItem("clickedCategory");
            if (clickedCategory) {
                var elements = document.getElementsByClassName("category__item");
                for (var i = 0; i < elements.length; i++) {
                    if (elements[i].textContent === clickedCategory) {
                        elements[i].classList.add("clicked");
                        phanTuDangClick = elements[i];
                        break;
                    }
                }
            }
        } else {
            console.log('localStorage is not supported.');
        }
    };
</script>
<?php
$sql_lietke_danhmucsp = "SELECT * FROM tbl_category ";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
if (isset($_GET['id'])) {
    $sql_namecate = "SELECT * FROM tbl_category WHERE id_category = '$_GET[id]' LIMIT 1";
    $query_namecate = mysqli_query($mysqli, $sql_namecate);
    $row_title = mysqli_fetch_array($query_namecate);
}
?>
<div class="product_container">
    <div class="grid ">
        <div class="grid__row">
            <div class="grid__column-2 mt-12">
                <nav class="category">
                    <h3 class="category__heading">
                        <i class="fa-solid fa-bars category__heading-icon"></i>
                        Danh Mục
                    </h3>
                    <ul class="category__list">
                        <?php
                        while ($row_category = mysqli_fetch_array($query_lietke_danhmucsp)) {
                            ?>
                            <a class="category__item-link"
                                href="?quanli=product&id=<?php echo $row_category['id_category'] ?>">
                                <li class="category__item" onclick="thayDoiMau(this)">
                                    <?php echo $row_category['namecategory'] ?>
                                </li>
                            </a>
                            <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <div class="grid__column-10 mt-12">
                <div class="grid__row">
                    <h3 class="heading-namecategory">
                        <?php if (isset($row_title))
                            echo $row_title['namecategory']; ?>
                    </h3>
                </div>
                <div class="grid__row">
                <?php
if (isset($_GET['search'])) {
    // Check if the search term is provided
    if (isset($_GET['nameproduct']) && !empty($_GET['nameproduct'])) {
        // Use prepared statement to avoid SQL injection
        $searchTerm = '%' . $_GET['nameproduct'] . '%';
        $sql_product = "SELECT * FROM tbl_product, tbl_category WHERE tbl_product.id_category = tbl_category.id_category AND tbl_product.nameproduct LIKE ?";
        $stmt = $mysqli->prepare($sql_product);
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $query_product = $stmt->get_result();
        $foundProducts = false;
        while ($row_product = mysqli_fetch_array($query_product)) {
            $foundProducts = true;
            ?>
           <div class="grid__column-sp">
            <form action="view/menu/addcart.php?idproduct=<?php echo $row_product['id_product'] ?>" method="post">
                <div class="home-product">
                    <a class="home-product__link"
                        href="index.php?quanli=detailproduct&idproduct=<?php echo $row_product['id_product'] ?>">
                        <img src="admin/module/quanlisanpham/upload/<?php echo $row_product['picture'] ?>" alt=""
                            class="home-product__img">

                        <div class="home-product__description">
                            <h4 class="home-product__heading">
                                <?php echo $row_product['nameproduct'] ?>
                            </h4>
                            <p class="description-product">
                                <?php echo $row_product['summary'] ?>
                            </p>
                            <p class="home-product__price">Giá:
                                <?php echo number_format($row_product['priceproduct'], 0, ',', '.') ?>đ
                            </p>
                            </div>
                    </a>
                    <p class="namecategory">Danh mục:
                        <?php echo $row_product['namecategory'] ?>
                    </p>
                    <button class="home-product__btn btn btn--primary" type="submit" name="addcart">
                        <i class="fa-solid fa-cart-plus home-product__icon"></i>
                        <p>Thêm giỏ hàng</p>
                    </button>
                </div>
            </form>
        </div>
            <?php
        }

        if (!$foundProducts) {
            echo "<h3>Không tìm thấy sản phẩm</h3>";
        }

        $stmt->close(); // Close the prepared statement
    } else {
        // Display a message if no search term is provided
        echo "<h3>Vui lòng nhập từ khóa tìm kiếm</h3>";
    }
}
?>

                </div>
            </div>
        </div>
    </div>
</div>
