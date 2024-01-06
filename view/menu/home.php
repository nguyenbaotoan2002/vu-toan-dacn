<?php



 $sql_lietke_danhmucsp = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.id_category = tbl_category.id_category AND tbl_product.status =1 ORDER BY id_product DESC";
 $query_new_product = mysqli_query($mysqli, $sql_lietke_danhmucsp);

?>
<div class="home__container" >
    <div class="grid">
        <!-- <div class="home__container-banner">
            <img src="assets/img/phone.jpg" alt="" class="home__container-banner-img">
        </div> -->
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner h-75 mb-4">
                <div class="carousel-item active">
                    <img src="./assets/img/panner4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/panner4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/panner4.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        



        <h3 class="home__container-heading">DANH SÁCH SẢN PHẨM</h3>
        <div class="grid__row">
            <?php
            while ($row_product = mysqli_fetch_array($query_new_product)) {    
                ?>
                <div class="grid__column-sp-home">
                    <div class="home-product">
                        <a class="home-product__link"
                            href="index.php?quanli=detailproduct&idproduct=<?php echo $row_product['id_product'] ?>">
                            <div class="home_product_img">
                                <img src="admin/module/quanlisanpham/upload/<?php echo $row_product['picture'] ?>" alt=""
                                    class="home-product__img">
                            </div>
                            <div class="home-product__description">
                                <h4 class="home-product__heading">
                                    <?php echo $row_product['nameproduct']?>
                                </h4>
                                <p class="description-product">
                                    <?php echo $row_product['summary'] ?>
                                </p>
                                <p class="home-product__price">Giá:
                                    <?php echo $row_product['priceproduct'] ?>đ
                                </p>
                            </div>
                        </a>
                        <p class="namecategory">Danh mục:
                            <?php echo $row_product['namecategory'] ?>
                        </p>
                        <button class="home-product__btn btn btn--primary">
                            <i class="fa-solid fa-bag-shopping home-product__icon"></i>
                            Xem ngay
                        </button>
                    </div>
                </div>
                <?php
            }


       //  }
            
            ?>
        </div>
    </div>
</div>