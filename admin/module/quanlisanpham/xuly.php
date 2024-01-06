<?php
include('../../config/config.php');
session_start();

$message = ""; // Initialize the variable
if (isset($_POST['addproduct'])) {
    $nameproduct = $_POST['nameproduct'];
    $productcode = $_POST['productcode'];
    // Check if the product code already exists
    $check_duplicate_sql = "SELECT COUNT(*) as count FROM tbl_product WHERE productcode = '".$productcode."'";
    $result = mysqli_query($mysqli, $check_duplicate_sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        // Product code already exists, set the error message
        $message = "Trùng mã sản phẩm.";

    }
    else{
        $quantity = $_POST['quantity'];
        $priceproduct = $_POST['priceproduct'];
        $summary = $_POST['summary'];   
        $content= $_POST['content'];
        $picture=$_FILES['pictureproduct']['name'];
        $picture_tmp=$_FILES['pictureproduct']['tmp_name'];
        $picture =time().'_'.$picture;
        $status= $_POST['status'];
        $category = $_POST['category'] ;
        $sql_edit = "INSERT INTO tbl_product(nameproduct,productcode,priceproduct,quantity,content,summary,picture,
        status,id_category)
         VALUE('".$nameproduct."','".$productcode."','".$priceproduct."','".$quantity."','".$content."','".$summary."',
        '".$picture."','".$status."','".$category."')";
        mysqli_query($mysqli, $sql_edit);
        move_uploaded_file($picture_tmp,'upload/'.$picture);
        header('Location:../../index.php?action=quanlisanpham&query=add');
    }
}elseif(isset($_POST['editproduct'])){
    $nameproduct = $_POST['nameproduct'];
    $productcode = $_POST['productcode'];
    $quantity = $_POST['quantity'];
    $priceproduct = $_POST['priceproduct'];
    $summary = $_POST['summary'];   
    $content= $_POST['content'];
    $picture=$_FILES['pictureproduct']['name'];
    $picture_tmp=$_FILES['pictureproduct']['tmp_name'];
    $picture =time().'_'.$picture;
    $status= $_POST['status'];
    $category = $_POST['category'] ;
    if($picture!=''){
        $id=$_GET['idproduct'];
        $sql= "SELECT * FROM tbl_product WHERE id_product = '$id' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('upload/' . $row['picture']);
        }
    move_uploaded_file($picture_tmp,'upload/'.$picture);     
    $sql_edit = "UPDATE tbl_product SET nameproduct='".$nameproduct."', productcode='".$productcode."' , quantity='".$quantity."',
    priceproduct='".$priceproduct."', summary='".$summary."', content='".$content."', picture='".$picture."', status='".$status."',
    id_category='".$category."' WHERE id_product='$_GET[idproduct]'";
    
    }else{
    $sql_edit = "UPDATE tbl_product SET nameproduct='".$nameproduct."', productcode='".$productcode."' , quantity='".$quantity."',
    priceproduct='".$priceproduct."', summary='".$summary."', content='".$content."',  status='".$status."', category='".$category."'WHERE id_product='$_GET[idproduct]'";
}
mysqli_query($mysqli, $sql_edit);
header('Location:../../index.php?action=quanlisanpham&query=add');
}elseif(isset($_GET['idproduct'])){
$id = $_GET['idproduct'];
$sql= "SELECT * FROM tbl_product WHERE id_product = '$id' LIMIT 1";
$query = mysqli_query($mysqli,$sql);
while($row = mysqli_fetch_array($query)){
    unlink('upload/'. $row['picture']);
}
$sql_delete="DELETE FROM tbl_product WHERE id_product = '".$id."'";
mysqli_query($mysqli, $sql_delete);
header("Location:../../index.php?action=quanlisanpham&query=add");
}
?>
<script>
// PHP variable to JavaScript variable
var message = "<?php echo $message; ?>";

// Check if the message is not empty and display an alert
if (message) {
    alert(message);
    window.location.href = '../../index.php';
}
</script>