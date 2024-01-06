<?php
$sql_lietke_sp = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.id_category = tbl_category.id_category ORDER BY id_product DESC";
$query_lietke_sp =  mysqli_query($mysqli, $sql_lietke_sp);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 1200px;
            margin: 0 auto; /* Để căn giữa trang web */
        }

        .section-header {
            color: #12A6DC;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0; /* Để tạo khoảng cách giữa các phần tử */
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-table, .custom-table th, .custom-table td {
            border: 1px solid #12A6DC;
        }

        .custom-table th, .custom-table td {
            padding: 10px;
            text-align: left;
        }

        .custom-table th {
            background-color: #12A6DC;
            color: #fff;
        }

        .custom-table img {
            max-width: 100%; /* Để đảm bảo hình ảnh không bị tràn ra khỏi ô */
            height: auto; /* Để giữ tỷ lệ khung hình ảnh */
        }

        .list-table a {
            color: #12A6DC;
            text-decoration: none;
        }

        .list-table a:hover {
            text-decoration: underline;
        }
    </style>
    <title>Danh mục sản phẩm</title>
</head>
<body>

<div class="container">

    <h3 class="section-header">Danh sách sản phẩm</h3>

    <table class="custom-table list-table" border="1">
        <form method="POST" action="module/quanlidanhmuc/xuly.php">
            <tr>
                <th>Id</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Mã sản phẩm</th>
                <th>Tóm Tắt</th>
                <th>Trạng Thái</th>
                <th>Danh mục</th>
                <th>Quản lí</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_sp)) {   
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['nameproduct'] ?></td>
                <td> <img src="module/quanlisanpham/upload/<?php echo $row['picture'] ?>" alt="" width="200px"></td>
                <td><?php echo $row['priceproduct'] ?></td>
                <td><?php echo $row['quantity'] ?></td>
                <td><?php echo $row['productcode'] ?></td>
                <td><?php echo $row['summary'] ?></td>
                <td><?php echo ($row['status'] == 1) ? 'Kích hoạt' : 'Ẩn'; ?></td>
                <td><?php echo $row['namecategory'] ?></td>
                <td>
                    <a href="module/quanlisanpham/xuly.php?idproduct=<?php echo $row['id_product'] ?>">Xóa</a> | 
                    <a href="?action=quanlisanpham&query=edit&idproduct=<?php echo $row['id_product'] ?>">Sửa</a>
                </td>
            </tr>
            <?php 
                }
            ?>
        </form>
    </table>
</div>
</body>
</html>
