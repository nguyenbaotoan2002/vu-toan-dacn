<?php
session_start();
// Thêm vào giỏ hàng
include('../../admin/config/config.php');
if (isset($_POST['addcart'])) {
    // Kiểm tra xem 'idproduct' có được đặt trong mảng $_GET không
    if (isset($_GET['idproduct'])) {
        $id = $_GET['idproduct'];
        $quantity = 1;
        $sql = "SELECT * FROM tbl_product WHERE id_product ='$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($query);

        if ($row) {
            $newproduct = array(
                'id_product' => $row['id_product'],
                'nameproduct' => $row['nameproduct'],
                'priceproduct' => $row['priceproduct'],
                'quantity' => $quantity,
                'picture' => $row['picture']
            );
            if (isset($_SESSION['cart'])) {
                $found = false;
                $product = array();
                foreach ($_SESSION['cart'] as $cart_item) {
                    if ($cart_item['id_product'] == $id) {
                        $product[] = array(
                            'id_product' => $cart_item['id_product'],
                            'nameproduct' => $cart_item['nameproduct'],
                            'priceproduct' => $cart_item['priceproduct'],
                            'quantity' => $cart_item['quantity'] + 1,
                            'picture' => $cart_item['picture']
                        );
                        $found = true;
                    } else {
                        $product[] = $cart_item;
                    }
                }

                if (!$found) {
                    $product[] = $newproduct;
                }
                $_SESSION['cart'] = $product;
            } else {
                $_SESSION['cart'] = array($newproduct);
            }
            //  header('Location:../../index.php?quanli=cart');
?>
            <script>
                window.history.back();
            </script>
    <?php
        }
    }
}
//Thêm số lượng
if (isset($_SESSION['cart']) && isset($_GET['plus'])) {
    $id = $_GET['plus'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id_product'] != $id) {
            $product[] = array(
                'id_product' => $cart_item['id_product'],
                'nameproduct' => $cart_item['nameproduct'],
                'priceproduct' => $cart_item['priceproduct'],
                'quantity' => $cart_item['quantity'],
                'picture' => $cart_item['picture']
            );
            $_SESSION['cart'] = $product;
        } else {
            $upquantity = $cart_item['quantity'] + 1;
            if ($cart_item['quantity'] < 10 && $cart_item['quantity'] > 0) {
                $product[] = array(
                    'id_product' => $cart_item['id_product'],
                    'nameproduct' => $cart_item['nameproduct'],
                    'priceproduct' => $cart_item['priceproduct'],
                    'quantity' => $upquantity,
                    'picture' => $cart_item['picture']
                );
            } else {
                $product[] = array(
                    'id_product' => $cart_item['id_product'],
                    'nameproduct' => $cart_item['nameproduct'],
                    'priceproduct' => $cart_item['priceproduct'],
                    'quantity' => $cart_item['quantity'],
                    'picture' => $cart_item['picture']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }

    header('Location:../../index.php?quanli=cart');
}
//Giảm số lượng
if (isset($_SESSION['cart']) && isset($_GET['minus'])) {
    $id = $_GET['minus'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id_product'] != $id) {
            $product[] = array(
                'id_product' => $cart_item['id_product'],
                'nameproduct' => $cart_item['nameproduct'],
                'priceproduct' => $cart_item['priceproduct'],
                'quantity' => $cart_item['quantity'],
                'picture' => $cart_item['picture']
            );
            $_SESSION['cart'] = $product;
        } else {
            $downquantity = $cart_item['quantity'] - 1;
            if ($cart_item['quantity'] > 1) {
                $product[] = array(
                    'id_product' => $cart_item['id_product'],
                    'nameproduct' => $cart_item['nameproduct'],
                    'priceproduct' => $cart_item['priceproduct'],
                    'quantity' => $downquantity,
                    'picture' => $cart_item['picture']
                );
            } else {
                $product[] = array(
                    'id_product' => $cart_item['id_product'],
                    'nameproduct' => $cart_item['nameproduct'],
                    'priceproduct' => $cart_item['priceproduct'],
                    'quantity' => $cart_item['quantity'],
                    'picture' => $cart_item['picture']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }

    header('Location:../../index.php?quanli=cart');
}
// Xóa sản phẩm khỏi giỏ hàng
if (isset($_SESSION['cart']) && isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $product = array();

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id_product'] != $id) {
            $product[] = array(
                'id_product' => $cart_item['id_product'],
                'nameproduct' => $cart_item['nameproduct'],
                'priceproduct' => $cart_item['priceproduct'],
                'quantity' => $cart_item['quantity'],
                'picture' => $cart_item['picture']
            );
        }
    }
    $_SESSION['cart'] = $product;
    ?>
    <script>
        window.history.back();
    </script>
<?php
}

?>