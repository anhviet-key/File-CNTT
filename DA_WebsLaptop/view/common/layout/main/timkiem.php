<?php 
    if(isset($_POST['Timkiem']))
        $tukhoa = $_POST['tukhoa'];
        $sql = "SELECT * FROM sanpham where tensp LIKE '%".$tukhoa."%'";
        $list = Database::db_get_list($sql);
        if(empty($tukhoa)){           
            Helper::redirect(Helper::get_url('index.php'));
        }
        if(empty($list)){
            echo '<script>
            swal({
                title: "Xin lỗi!",
                text: "Không có dữ liệu về sản phẩm",
                icon: "warning",
                button: "Trở lại",
              });</script>';
              $sql = "SELECT * FROM sanpham";
              $list = Database::db_get_list($sql);
        }
 ?>

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
                                    <li class="breadcrumb-item active" aria-current="page">Từ khoá: <span class="text-success"><?php echo $_POST['tukhoa'];?></span></li>
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
                        <div class="shop-product-wrapper pt-34">
                            <!-- shop product top wrap start -->
                            
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
                                        <img src="uploads/<?php echo $chitiet['anhsp']; ?>" alt="" style="border-style:none;"/>
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
