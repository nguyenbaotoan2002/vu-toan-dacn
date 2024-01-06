<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        #right-panel {
            text-align: center;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .jumbotron {
           
            border-radius: 10px; /* Góc bo tròn cho jumbotron */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .header__navbar-item-register {
            background-color: green;
            
            padding: 10px 20px;
            border: none;
            border-radius: 5px; /* Góc bo tròn cho button */
            cursor: pointer;
            margin: 0 10px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
           
        }

        .header__navbar-item-register:hover {
            background-color: yellow;
        }

        .admin-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .admin-list li {
            display: inline-block;
            background-color: violet;
        }

        .admin-list li a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <div id="right-panel" class="right-panel">
        <div class="jumbotron">
            <h1 class="display-4" style="color: black;">Chào mừng tới trang quản trị</h1>
            <button class="header__navbar-item-register">
                <ul class="admin-list">
                    <li><a href="index.php?action=quanlidanhmucsanpham&query=add">Danh mục</a></li>
                </ul>
            </button>

            <button class="header__navbar-item-register">
                <ul class="admin-list">
                    <li><a href="index.php?action=quanlisanpham&query=add">Sản phẩm</a></li>
                </ul>
            </button>
        </div>
        <div style="height: 5px"></div>
    </div>
    </body>
</html>
