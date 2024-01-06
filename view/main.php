<?php
if (isset($_GET['quanli'])) {
   $flag = $_GET['quanli'];
} else {
   $flag = '';
}
if ($flag == 'contact') {
   include('view/menu/contact.php');
} elseif ($flag == 'product') {
   include('view/menu/product.php');
} elseif ($flag == 'introduce') {
   include('view/menu/introduce.php');
} elseif ($flag == 'cart') {
   include('view/menu/cart.php');
} elseif ($flag == 'detailproduct') {
   include('view/menu/detailproduct.php');
} elseif ($flag == 'searchproduct') {
   include('view/menu/searchproduct.php');
} else {
   include('view/menu/home.php');
}
?>