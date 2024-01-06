<header class="header">
    <div class="grid">
        <nav class="header__navbar ">
            <ul class="header__navbar-list">
            </ul>
            <ul class="header__navbar-list">
                <li class="header__navbar-item header__navbar-item--has-notification ">
                    <a href="#" class="header__navbar-item-link">
                        <i class="header__navbar-icon fa-solid fa-bell"></i>
                    </a>
                </li>
                <li class="header__navbar-item ">
                    <a href="#" class="header__navbar-item-link">
                        <i class="header__navbar-icon fa-regular fa-circle-question"></i>
                    </a>
                </li>
                <?php if (isset($_SESSION['role'])) {
                ?>
                    <li class="header__navbar-item ">
                        <i class="fa-solid fa-user navbar-admin-icon header__navbar-item-icon"></i>
                        <?php echo $_SESSION['username'] ?>
                    </li>
                    <li class="header__navbar-item"> <a class="header__navbar-item-logout" href="index.php?logout">
                    <button class="header__navbar-item-register">
                                <span style="font-weight: bold; color: red;">Đăng Xuất</span>
                            </button></a></li>
                <?php
                } else { ?>
                    <li class="header__navbar-item header__navbar-item--bold  header__navbar-item--separate">
                        <a href="./admin/login.php" class="header__navbar-icon-link mx-2">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <a href="./admin/login.php" class="header__navbar-item-register">
                        <button class="header__navbar-item-register">
                                <span style="font-weight: bold; color: red;">Đăng Nhập</span>
                            </button></a>
                    </li>
                    <li class="header__navbar-item header__navbar-item--bold">
                        <a href="./admin/register.php" class="header__navbar-item-register">
                            <button class="header__navbar-item-register">
                                <span style="font-weight: bold; color: red;">Đăng Ký</span>
                            </button></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- Header Search -->
        <div class="header-with-search">
            <div class="header__logo">
                <a href="index.php" class="header__logo-link">
                    <img src="./assets/img/logoo.jpg" alt="" class=" header__logo-img">
                </a>
            </div>

            <div class="header__search">
                <div class="header__search-wrap">
                    <form action="index.php?quanli=searchproduct" class="header__search-form" method="get">
                        <input type="text" class="header__search-input" placeholder="Tìm kiếm sản phẩm" name="nameproduct" value="<?php echo $_GET['nameproduct']?? '';?>">
                        <button class="header__search-btn" name="search" type="submit">
                            <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </button>
                        <input type="hidden" name="quanli" value="searchproduct">
                    </form>
                </div>
            </div>
            <!-- Cart Layout -->
            <div class="header__cart">

                <div class="header__cart-warp">
                    <i class="header__cart-icon fa-sharp fa-solid fa-cart-shopping"></i>
                    <?php
                    $i = 0;
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $cart_item) {
                            $i++;
                    ?>
                            <span class="header__cart-notice">
                                <?php echo $i ?>
                            </span>
                    <?php }
                    } ?>
                    <!-- Has cart: header __list--no-cart -->
                    <div class="header__cart-list">
                        <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                        <ul class="header__cart-list-item">
                            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $cart_item) {
                            ?>
                                    <!-- cart item -->
                                    <li style="height: 70px;" class="header__cart-item">
                                        <img width="50" height="50" src="admin/module/quanlisanpham/upload/<?php echo $cart_item['picture'] ?>" alt="" class="header__cart-img">
                                        <div class="header__cart-item-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name">
                                                    <?php echo $cart_item['nameproduct'] ?>
                                                </h5>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price">
                                                        <?php echo number_format($cart_item['priceproduct'], 0, ',', '.') ?>đ
                                                    </span>
                                                    <span class="header__cart-item-multiply">x</span>
                                                    <span class="header__cart-item-quality">
                                                        <?php echo $cart_item['quantity'] ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <a href="view/menu/addcart.php?delete=<?php echo $cart_item['id_product'] ?>" class="header__cart-item-remove">Xóa</>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                } ?><a href="index.php?quanli=cart" class="header__cart-view-cart btn btn--primary">Xem
                                    giỏ hàng</a>
                            <?php
                            } else { ?>                                                                                             
                        </ul>
                        <img src="assets/img/nocart.png" alt="" class="header__cart--no-cart-img">
                        <span class="header__cart--no-cart-msg">
                            Chưa có sản phẩm
                        </span>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>