<body>
    <div class="grid">
        <div class="cart-product">
            <h1><i class="fa-solid fa-cart-shopping"></i>
                Giỏ Hàng Của Bạn </h1>
            <table class="cart-product-table">
                <?php
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    ?>
                    <tr class="cart-product-heading-wrapper">
                        <th class="cart-product-heading">No</th>
                        <th class="cart-product-heading">Tên sản phẩm</th>
                        <th class="cart-product-heading"></th>
                        <th class="cart-product-heading">Giá</th>
                        <th class="cart-product-heading">Số lượng</th>
                        <th class="cart-product-heading">Tổng cộng</th>
                    </tr>
                    <?php
                    $i = 1;
                    $total = 0;
                    $totalcart = 0;
                    foreach ($_SESSION['cart'] as $cart_item) {
                        $total = $cart_item['quantity'] * $cart_item['priceproduct'];
                        $totalcart += $total;
                        ?>
                        <tr>
                            <td class="cart-product-item cart-product-item-id">
                                 <?php echo $i ?> 
                            </td>

                            <td class="cart-product-item">
                                <?php echo $cart_item['nameproduct'] ?>
                            </td>

                            <td class="cart-product-item"><img
                                    src="admin/module/quanlisanpham/upload/<?php echo $cart_item['picture'] ?>" alt="Product 1">
                            </td>
                            <td class="cart-product-item">
                                <?php echo number_format($cart_item['priceproduct'], 0, ',', '.') ?>đ
                            </td>
                            <td class="text-center cart-product-item"> <a
                                    href="view/menu/addcart.php?minus=<?php echo $cart_item['id_product'] ?>"
                                    class="cart-product__icon-link">
                                    <i class="fa-solid fa-minus"></i></a>
                                <?php echo $cart_item['quantity']  ?>

                                <a href="view/menu/addcart.php?plus=<?php echo $cart_item['id_product'] ?>"
                                    class="cart-product__icon-link">
                                    <i class="fa-solid fa-plus"></i></a> 
                            </td>       
                            <td class="cart-product-item ">
                                <?php echo number_format($total, 0, ',', '.') ?>đ
                            </td>

                            <td class="cart-product-item">
                                <a href="view/menu/addcart.php?delete=<?php echo $cart_item['id_product'] ?>"
                                    class="remove-button">Xóa</a>
                            </td>
                        </tr>
                        <?php
                        
                    } ?>                                                                    
                    <td class="cart-total" colspan="7">
                        <p class="cart-product-total">Thành tiền:
                            <?php echo number_format($totalcart, 0, ',', '.') ?> đ
                        </p>
                        <button class="btn btn--primary btn-buy-cart">Mua hàng</button>
                    </td>
                    <?php
                } elseif (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                    ?>
                    <p class=" cart-no-product">Bạn chưa thêm sản phẩm vào giỏ hàng !</p>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>