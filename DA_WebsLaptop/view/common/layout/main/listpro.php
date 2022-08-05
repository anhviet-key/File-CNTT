<?php
$sql = "select * from sanpham where iddm='$_GET[id]' order by idsp DESC";
$list = Database::db_get_list($sql);
?>
<?php
$sql = "select * from danhmuc order by iddm DESC";
$listdanhmuc = Database::db_get_list($sql);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <!-- Site title -->
    <title>Sản phẩm</title>

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
                                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page wrapper start -->
        <div class="page-main-wrapper">
            <div class="container">
                <div class="row">
                    <!-- product main wrap start -->
                    <div class="col-lg-12">
                        <div class="shop-banner img-full">
                            <img src="public/user/assets/img/banner/banner2.jpg" alt="">
                        </div>
                        <!-- product view wrapper area start -->
                        <div class="shop-product-wrapper pt-10">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row">
                                    <div class="col-lg-7 col-md-6">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode mr-70 mr-sm-0">
                                                <a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                                <!-- <a href="#" data-target="list"><i class="fa fa-list"></i></a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sắp xếp: </p>
                                                <a href="?c=sanpham&per_page=5&page=1">Mặc định</a>
                                                    <?php 
                                                     if(!empty($list))
                                                     foreach($listdanhmuc as $row):
                                                     ?>
                                                    <a href="?c=list&id=<?php echo $row['iddm']?>" class="pl-20">Laptop <?php echo $row['tendm']; ?></a>

                                                    <?php endforeach; ?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- latest product start -->
        <div class="latest-product">
            <div class="container">
                
                <!-- featured category start -->
                <!-- <div class="latest-product-active slick-padding slick-arrow-style"> -->
                    <!-- product single item start -->
                    <?php 
                        if(!empty($list))
                         foreach($list as $row):
                    ?>
                    
                    <!-- product single list item start -->
                    <div class="product-list-item mb-30">
                                        <div class="product-thumb">
                                            <a href="?c=chitietsp&id=<?php echo $row["masp"]?>">
                                                <img src="uploads/<?php echo $row['anhsp']; ?>" class="img-pri" alt="">
                                            </a>
                                        </div>
                                        <div class="product-list-content">
                                            <h3><a href="?c=chitietsp&id=<?php echo $row["masp"]?>"><?php echo $row['tensp']; ?></a></h3>
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
                                            <div class="pricebox">
                                                <span class="regular-price"><?php echo number_format($row['giasp'],0,',','.') ?> VNĐ</span>
                                            </div>
                                            <p><?php echo $row['mota']; ?></p>
                                            
                                            <div class="product-list-action-link">
                                                <a class="buy-btn" href="#" data-toggle="tooltip" data-placement="top" title="Add to cart">Thêm vào giỏ<i class="fa fa-shopping-cart"></i> </a>
                                                <a href="#" data-toggle="modal" data-target="#<?php echo $row['masp']; ?>"> <span data-toggle="tooltip" data-placement="top" title="Xem trước"><i class="fa fa-search"></i></span> </a>
                                            </div>
                                        </div>
                                    </div>
                    <!-- product single item end -->
                    <?php endforeach; ?>
                <!-- </div> -->
                <!-- featured category end -->
            </div>
        </div>
        <!-- latest product end -->
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
                                            <a class="buy-btn" href="#">Thêm vào giỏ<i class="fa fa-shopping-cart"></i>
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
                        </div>
                        <!-- product view wrapper area end -->

                        <!-- start pagination area -->
                        <!-- <div class="paginatoin-area text-center pt-28">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="pagination-box">
                                        <li><a class="Previous" href="#">Trước</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a class="Next" href="#"> Kế tiếp </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- end pagination area -->

                    </div>
                    <!-- product main wrap end -->
                </div>
            </div>
        </div>
        <!-- page wrapper end -->

    </div>

    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
        </div>
</body>


</html>