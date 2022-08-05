<?php
$sql = "select * from sanpham LIMIT 3";
$list = Database::db_get_list($sql);
?>
<?php
    $sql = "select * from giamgia where magg='$_GET[id]' LIMIT 1";
    $listgg = Database::db_get_list($sql);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <!-- Site title -->
    <title>Chi tiết</title>
</head>

<body>
    <div class="wrapper box-layout">
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                                    <li class="breadcrumb-item"><a href="?c=sanpham&per_page=5&page=1">Sản phẩm</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- product details wrapper start -->
        <div class="product-details-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <!-- product details inner end -->
                        <?php 
                        if(!empty($listgg))
                        foreach($listgg as $row):
                    ?>
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product-large-slider mb-20 slick-arrow-style_2">
                                        <div class="pro-large-img" id="img1">
                                            <img src="uploads/<?php echo $row['anhsp']; ?>" alt="" height="300px" style="border-style:none;"/>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product-details-des mt-md-34 mt-sm-34">
                                        <h3><?php echo $row['tensp']; ?></a></h3>
                                        <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span>1 review(s)</span>
                                            </div>
                                        </div>
                                        <div class="customer-rev">
                                            <a href="#">(1 đánh giá của khách hàng)</a>
                                        </div>
                                        <div class="availability mt-10">
                                            <h5>Còn hàng:</h5>
                                            <span><?php echo $row['soluong']; ?> Trong kho</span>
                                        </div>
                                        <div class="pricebox">
                                            <span class="regular-price"><?php echo number_format($row['giasp'],0,',','.') ?> VNĐ</span>
                                        </div>
                                        <!-- <div class="pricebox">
                                            <span class="regular-price"><?php echo number_format($row['giagiam'],0,',','.') ?> VNĐ</span>
                                        </div> -->
                                        <p><?php echo $row['mota']; ?></p>
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <div class="quantity">
                                                <div class="pro-qty"><input type="text" value="1"></div>
                                            </div>
                                            <div class="action_link">
                                                <a class="buy-btn" href="#">Thêm vào giỏ<i class="fa fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                        <div class="useful-links mt-20">
                                        </div>
                                        <div class="share-icon mt-20">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                            <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->
                        <?php endforeach; ?>


                    </div>

                    <!-- sidebar start -->
                    <div class="col-lg-3">
                        <div class="shop-sidebar-wrap fix mt-md-22 mt-sm-22">
                            <!-- featured category start -->
                            <div class="sidebar-widget mb-22">
                                <div class="section-title-2 d-flex justify-content-between mb-28">
                                    <h3>Sản phẩm mới</h3>
                                    <div class="category-append"></div>
                                </div> <!-- section title end -->
                                <?php 
                                 if(!empty($list))
                                 foreach($list as $rows):
                                ?>
                                <div class="category-carousel-active row" data-row="4">
                                    <div class="col">
                                        <div class="category-item">
                                            <div class="category-item">
                                                <a href="?c=chitietsp&id=<?php echo $rows["masp"]?>">
                                                    <img src="uploads/<?php echo $rows['anhsp']; ?>" alt="" style="width: 100px;">
                                                </a>
                                            </div>
                                            <div class="category-content">
                                                <h4><a href="?c=chitietsp&id=<?php echo $rows["masp"]?>"><?php echo $rows['tensp']; ?></a></h4>
                                                <div class="price-box">
                                                    <div class="regular-price"><?php echo number_format($rows['giasp'],0,',','.') ?> VNĐ</div>
                                                    <div class="old-price"></del>
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <div class="pro-review">
                                                        <span>1 review(s)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end single item -->
                                    
                                </div>
                            </div>
                            <!-- featured category end -->
                            <?php endforeach; ?>

                        </div>
                    </div>
                    <!-- sidebar end -->
                </div>
            </div>
        </div>
        <!-- product details wrapper end -->

        <!-- brand area start -->
        <div class="brand-area pt-28 pb-30 pt-md-14 pt-sm-14">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-30">
                            <div class="title-icon">
                                <i class="fa fa-crop"></i>
                            </div>
                            <h3>Thương hiệu phổ biến</h3>
                        </div> <!-- section title end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="brand-active slick-padding slick-arrow-style">
                            <div class="brand-item text-center">
                                <a href="#"><img src="public/user/assets/img/brand/lg1.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="public/user/assets/img/brand/lg2.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="public/user/assets/img/brand/lg3.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="public/user/assets/img/brand/lg4.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="public/user/assets/img/brand/lg5.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="public/user/assets/img/brand/lg6.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="public/user/assets/img/brand/lg7.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="public/user/assets/img/brand/lg8.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="public/user/assets/img/brand/lg9.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->

    </div>

    <!-- Quick view modal start -->
    <div class="modal" id="quick_view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider slick-arrow-style_2 mb-20">
                                    <div class="pro-large-img">
                                        <img src="public/user/assets/img/product/product-details-img1.jpg" alt="" />
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="public/user/assets/img/product/product-details-img2.jpg" alt=""/>
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="public/user/assets/img/product/product-details-img3.jpg" alt=""/>
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="public/user/assets/img/product/product-details-img4.jpg" alt=""/>
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="public/user/assets/img/product/product-details-img5.jpg" alt=""/>
                                    </div>
                                </div>
                                <div class="pro-nav slick-padding2 slick-arrow-style_2">
                                    <div class="pro-nav-thumb"><img src="public/user/assets/img/product/product-details-img1.jpg" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="public/user/assets/img/product/product-details-img2.jpg" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="public/user/assets/img/product/product-details-img3.jpg" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="public/user/assets/img/product/product-details-img4.jpg" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="public/user/assets/img/product/product-details-img5.jpg" alt="" /></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- product details inner end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal end -->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>

</body>


</html>