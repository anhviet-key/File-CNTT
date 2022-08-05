<?php
$sql = "select * from sanpham order by idsp DESC LIMIT 10";
$list = Database::db_get_list($sql);
?>
<?php
$sql = "select * from giamgia order by idgg DESC";
$listgg = Database::db_get_list($sql);
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Trang chủ</title>

</head>

<body>

<style>
  span.slick-prev.slick-arrow {
    margin-top: -160px;
  }

  span.slick-next.slick-arrow {
    margin-top: -160px;
  }
</style>
<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-wrapper-area">
                        <div class="hero-slider-active hero__1 slick-dot-style hero-dot">
                            <div class="single-slider" style="background-image: url(public/user/assets/img/slider/banner.jpg);">
                                <div class="container p-0">
                                    <div class="slider-main-content">
                                        <div class="slider-content-img">
                                            <img src="public/user/assets/img/slider/slider11_lable1.png" alt="">
                                            <img src="public/user/assets/img/slider/slider11_lable2.png" alt="">
                                            
                                        </div>
                                        <div class="slider-text">
                                            <!-- <div class="slider-label">
                                                <img src="public/user/assets/img/slider/slider11_lable4.png" alt="">
                                            </div> -->
                                            <h1>Laptop mới nhất</h1>
                                            <p>Đột phá, cải tiến và nhiều công nghệ mới.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slider" style="background-image: url(public/user/assets/img/slider/mi1.jpg);">
                                <div class="container p-0">
                                    <div class="slider-main-content">
                                        <div class="slider-content-img">
                                            <img src="public/user/assets/img/slider/0bc.jpg" alt="">
                                        </div>
                                        <div class="slider-text">
                                            <!-- <div class="slider-label">
                                                <img src="public/user/assets/img/slider/laptop.png" alt="">
                                            </div> -->
                                            <h1>Siêu khuyến mãi</h1>
                                            <p>Săn Sale Online Mỗi Ngày</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- hero slider end -->

        <!-- page wrapper start -->
        <div class="page-wrapper pt-6 pb-28 pb-md-6 pb-sm-6 pt-xs-36">
            <div class="container">
                <div class="row">
                    <!-- start home sidebar -->
                    <div class="col-lg-3">
                        <div class="home-sidebar">
                        <?php
                            $sql = "select * from tintuc order by idtt DESC LIMIT 3";
                            $listtintuc = Database::db_get_list($sql);
                        ?>

                            <!-- best seller area start -->
                            <div class="main-sidebar blog-area mb-24">
                                <div class="section-title-2 d-flex justify-content-between mb-28">
                                    <h3>Blog mới nhất</h3>
                                    <div class="category-append"></div>
                                </div> <!-- section title end -->
                                <!-- blog wrapper start -->
                                <div class="blog-carousel-active">
                                <?php 
                                    if(!empty($list))
                                    foreach($listtintuc as $tt):
                                ?>
                                    <div class="blog-item">
                                        <div class="blog-thumb img-full fix">
                                            <a href="?c=chitiettintuc&id=<?php echo $tt["matt"]?>">
                                                <img src="uploads/<?php echo $tt['anhtt']; ?>" alt="" style="height: 200px;">
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <h3><a href="?c=chitiettintuc&id=<?php echo $tt["matt"]?>"><?php echo $tt['tieude']?></a></h3>
                                            <div class="blog-meta">
                                                <span class="posted-author">by: admin</span>
                                                <span class="post-date"><?php echo $tt["ngaythemtt"]?></span>
                                            </div>
                                            <p><?php echo $tt["preview"]?></p>
                                        </div>
                                        <a href="?c=chitiettintuc&id=<?php echo $tt["matt"]?>">đọc thêm <i class="fa fa-long-arrow-right"></i></a>
                                    </div> <!-- end single blog item -->
                                <?php endforeach ?>
                                </div>
                                <!-- blog wrapper end -->
                            </div>
                            <!-- best seller area end -->

                        </div>
                    </div>
                    <!-- end home sidebar -->
                    <div class="col-lg-9">
                        <!-- featured category area start -->
                        <div class="feature-category-area mt-md-70">
                            <div class="section-title mb-30">
                                <div class="title-icon">
                                    <i class="fa fa-bookmark"></i>
                                </div>
                                <h3>Giảm giá</h3>
                            </div> <!-- section title end -->
                            <!-- featured category start -->
                            <div class="featured-carousel-active slick-padding slick-arrow-style">
                                <!-- product single item start -->
                                
                                <?php 
                                 if(!empty($listgg))
                                 foreach($listgg as $rows):
                                ?>
                                <div class="product-item fix">
                                    <div class="product-thumb">
                                        <a href="?c=chitietspgg&id=<?php echo $rows["magg"]?>">
                                        <img src="uploads/<?php echo $rows['anhsp']; ?>" class="img-pri" alt="" style="height: 150px">
                                        </a>
                                        <div class="product-label">
                                            <span>hot</span>
                                        </div>
                                        <div class="product-action-link">
                                            <a href="#" data-toggle="modal" data-target="#<?php echo $rows['magg']; ?>"> <span
                                                    data-toggle="tooltip" data-placement="left" title="Xem trước"><i
                                                        class="fa fa-search"></i></span> </a>
                                            <a href="?c=giohang&id=<?php echo $rows['idgg']?>" data-toggle="tooltip" data-placement="left" title="Thêm vào giỏ"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4><a href="?c=chitietspgg&id=<?php echo $rows["magg"]?>"><?php echo $rows['tensp']; ?></a></h4>
                                        <div class="pricebox">
                                            <span class="regular-price"><?php echo number_format($rows['giasp'],0,',','.') ?> VNĐ</span>
                                            <div class="old-price">
                                                    <del><?php echo number_format($rows['giagiam'],0,',','.') ?> VNĐ</del>
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
                                    </div>
                                </div>
                                <!-- product single item end -->
                                <?php endforeach; ?>
                            </div>
                            <!-- featured category end -->
                        </div>
                        <!-- featured category area end -->

                        <!-- banner statistic start -->
                        <div class="banner-statistic pt-28 pb-30 pb-sm-0">
                            <div class="row">
                                <div class="col-lg-7 col-md-5">
                                    <div class="img-container fix img-full mb-sm-30">
                                        <a href="#">
                                            <img src="public/user/assets/img/banner/micr.jpg" alt="" style="height: 195px;">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5">
                                    <div class="img-container fix img-full mb-sm-30">
                                        <a href="#">
                                            <img src="public/user/assets/img/banner/best.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- banner statistic end -->
                    </>
                </div>
            </div>
        </div>
        <!-- page wrapper end -->

        <!-- latest product start -->
        <div class="latest-product">
            <div class="container">
                <div class="section-title mb-30">
                    <div class="title-icon">
                        <i class="fa fa-flash"></i>
                    </div>
                    <h3>Sản phẩm mới nhất</h3>
                </div> <!-- section title end -->
                <!-- featured category start -->
                <div class="latest-product-active slick-padding slick-arrow-style">
                    <!-- product single item start -->
                    <?php 
                        if(!empty($list))
                         foreach($list as $row):
                    ?>
                    
                    <div class="product-item fix">
                        <div class="product-thumb">
                            <a href="?c=chitietsp&id=<?php echo $row["masp"]?>">
                                <img src="uploads/<?php echo $row['anhsp']; ?>" class="img-pri" alt="" style="height: 150px;">
                                <!-- <img src="public/user/assets/img/product/product-img2.jpg" class="img-sec" alt=""> -->
                            </a>
                            <div class="product-label">
                                <span>hot</span>
                            </div>
                            <div class="product-action-link">
                                <a href="#" data-toggle="modal" data-target="#<?php echo $row['masp']; ?>"> <span data-toggle="tooltip"
                                        data-placement="left" title="Xem trước"><i class="fa fa-search"></i></span>
                                </a>
                                <a href="?c=giohang&id=<?php echo $row['idsp']?>" data-toggle="tooltip" data-placement="left" title="Thêm vào giỏ"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="?c=chitietsp&id=<?php echo $row["masp"]?>"><?php echo $row['tensp']; ?></a></h4>
                            <div class="pricebox">
                                <span class="regular-price"><?php echo number_format($row['giasp'],0,',','.') ?> VNĐ</span>
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
                        </div>
                    </div>
                    <!-- product single item end -->
                    <?php endforeach; ?>
                </div>
                <!-- featured category end -->
            </div>
        </div>
        <!-- latest product end -->

        <!-- brand area start -->
        <div class="brand-area pt-28 pb-30">
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
                                <img src="public/user/assets/img/brand/lg1.png" alt="">
                            </div>
                            <div class="brand-item text-center">
                                <img src="public/user/assets/img/brand/lg2.png" alt="">
                            </div>
                            <div class="brand-item text-center">
                                <img src="public/user/assets/img/brand/lg3.png" alt="">
                            </div>
                            <div class="brand-item text-center">
                                <img src="public/user/assets/img/brand/lg4.png" alt="">
                            </div>
                            <div class="brand-item text-center">
                                <img src="public/user/assets/img/brand/lg5.png" alt="">
                            </div>
                            <div class="brand-item text-center">
                                <img src="public/user/assets/img/brand/lg6.png" alt="">
                            </div>
                            <div class="brand-item text-center">
                                <img src="public/user/assets/img/brand/lg7.png" alt="">
                            </div>
                            <div class="brand-item text-center">
                                <img src="public/user/assets/img/brand/lg8.png" alt="">
                            </div>
                            <div class="brand-item text-center">
                                <img src="public/user/assets/img/brand/lg9.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->
                    <?php 
                        if(!empty($list))
                         foreach($list as $chitiet):
                    ?>
        <!-- Xem trước modal start -->
         <div class="modal" id="<?php echo $chitiet['masp']; ?>">
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
                                <div class="product-large-slider slick-arrow mb-20">
                                    <div class="pro-large-img">
                                        <img src="uploads/<?php echo $chitiet['anhsp']; ?>" alt="" height="300px" style="border-style:none;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des mt-md-34 mt-sm-34">
                                    <h3><a href="?c=chitietsp&id=<?php echo $chitiet["masp"]?>"><?php echo $chitiet['tensp']; ?></a></h3>
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
                                    <div class="availability mt-10">
                                        <h5>Còn lại:</h5>
                                        <span><?php echo $chitiet['soluong']; ?> Trong kho</span>
                                    </div>
                                    <div class="pricebox">
                                        <span class="regular-price"><?php echo number_format($chitiet['giasp'],0,',','.') ?>&nbsp;VNĐ</span>
                                    </div>
                                    <p><?php echo $chitiet['mota']; ?></p>
                                    <div class="quantity-cart-box d-flex align-items-center mt-20">
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="buy-btn" href="?c=giohang&id=<?php echo $chitiet['idsp']?>">Thêm vào giỏ<i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->
                    
                </div>
            </div>
        </div>
         </div>
        <!-- Xem trước modal end -->
        <?php endforeach; ?>

        <?php 
                        if(!empty($listgg))
                         foreach($listgg as $chitietgg):
                    ?>
        <!-- Xem trước modal start -->
         <div class="modal" id="<?php echo $chitietgg['magg']; ?>">
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
                                <div class="product-large-slider slick-arrow mb-20">
                                    <div class="pro-large-img">
                                        <img src="uploads/<?php echo $chitietgg['anhsp']; ?>" alt="" height="300px" style="border-style:none;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des mt-md-34 mt-sm-34">
                                    <h3><a href="?c=chitietsp&id=<?php echo $chitietgg["masp"]?>"><?php echo $chitiet['tensp']; ?></a></h3>
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
                                    <div class="availability mt-10">
                                        <h5>Còn lại:</h5>
                                        <span><?php echo $chitietgg['soluong']; ?> Trong kho</span>
                                    </div>
                                    <div class="pricebox">
                                        <span class="regular-price"><?php echo number_format($chitietgg['giasp'],0,',','.') ?>&nbsp;VNĐ</span>
                                    </div>
                                    <p><?php echo $chitietgg['mota']; ?></p>
                                    <div class="quantity-cart-box d-flex align-items-center mt-20">
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="buy-btn" href="?c=giohang&id=<?php echo $chitietgg['magg']?>">Thêm vào giỏ<i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->
                    
                </div>
            </div>
        </div>
         </div>
        <!-- Xem trước modal end -->
        <?php endforeach; ?>
        <!-- Scroll to top start -->
        <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
        </div>
        <!-- Scroll to Top End -->
</body>


</html>