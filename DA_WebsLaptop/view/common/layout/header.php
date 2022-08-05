<?php
$sql = "select * from danhmuc order by iddm DESC";
$list = Database::db_get_list($sql);
?>

<!-- color switcher start -->
<div class="color-switcher">
        <div class="color-switcher-inner">
            <div class="switcher-icon">
                <i class="fa fa-cog fa-spin"></i>
            </div>

            <!-- <div class="switcher-panel-item">
                <h3>Chọn màu</h3>
                <ul class="nav flex-wrap colors">
                    <li class="default active" data-color="default" data-toggle="tooltip" data-placement="top" title="Red"></li>
                    <li class="green" data-color="green" data-toggle="tooltip" data-placement="top" title="Green"></li>
                    <li class="soft-green" data-color="soft-green" data-toggle="tooltip" data-placement="top" title="Soft-Green"></li>
                    <li class="sky-blue" data-color="sky-blue" data-toggle="tooltip" data-placement="top" title="Sky-Blue"></li>
                    <li class="orange" data-color="orange" data-toggle="tooltip" data-placement="top" title="Orange"></li>
                    <li class="violet" data-color="violet" data-toggle="tooltip" data-placement="top" title="Violet"></li>
                </ul>
            </div> -->

            <div class="switcher-panel-item">
                <h3>Kiểu bố cục</h3>
                <ul class="nav layout-changer">
                    <li><button class="btn-layout-changer active" data-layout="wide">Rộng</button></li>
                    <li><button class="btn-layout-changer" data-layout="boxed">Hộp</button></li>
                </ul>
            </div>

            <div class="switcher-panel-item bg">
                <h3>Nền</h3>
                <ul class="nav flex-wrap bgbody-style bg-pattern">
                    <li><img src="public/user/assets/img/bg-panel/bg-pettern/1.png" alt="Pettern"></li>
                    <li><img src="public/user/assets/img/bg-panel/bg-pettern/2.png" alt="Pettern"></li>
                    <li><img src="public/user/assets/img/bg-panel/bg-pettern/3.png" alt="Pettern"></li>
                    <li><img src="public/user/assets/img/bg-panel/bg-pettern/4.png" alt="Pettern"></li>
                    <li><img src="public/user/assets/img/bg-panel/bg-pettern/5.png" alt="Pettern"></li>
                    <li><img src="public/user/assets/img/bg-panel/bg-pettern/6.png" alt="Pettern"></li>
                </ul>
            </div>

            <div class="switcher-panel-item bg">
                <h3>Hình ảnh</h3>
                <ul class="nav flex-wrap bgbody-style bg-img">
                    <li><img src="public/user/assets/img/bg-panel/bg-img/01.jpg" alt="Images"></li>
                    <li><img src="public/user/assets/img/bg-panel/bg-img/02.jpg" alt="Images"></li>
                    <li><img src="public/user/assets/img/bg-panel/bg-img/03.jpg" alt="Images"></li>
                    <li><img src="public/user/assets/img/bg-panel/bg-img/04.jpg" alt="Images"></li>
                    <li><img src="public/user/assets/img/bg-panel/bg-img/05.jpg" alt="Images"></li>
                    <li><img src="public/user/assets/img/bg-panel/bg-img/06.jpg" alt="Images"></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- color switcher end -->

    <!-- header area start -->
    <header>
            <!-- header top start -->
            <div class="header-top-area bg-gray text-center text-md-left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-5">
                            <div class="header-call-action">
                                <span title="email hổ trợ khách hàng">
                                    <i class="fa fa-envelope"></i>
                                    hngcao05@gmail.com
                                </span>
                                &nbsp;
                                <cite title="Liên hệ hổ trợ">
                                    <i class="fa fa-phone"></i>
                                    0349423372
                                </cite>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="header-top-right float-md-right float-none">
                                <nav>
                                    <ul>
                                        <li>
                                            <div class="dropdown header-top-dropdown">
                                                <a class="dropdown-toggle" id="myaccount" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Tài khoản
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="myaccount">
                                                    
                                                    <a class="dropdown-item" href="?c=TK">Tài khoản của tôi</a>
                                                    <a class="dropdown-item" href="#loginuser" data-toggle="modal">Đăng nhập</href>
                                                    <a class="dropdown-item" href="#register" data-toggle="modal">Đăng ký</a>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <a href="?c=giohang">Giỏ hàng</a>
                                        </li>
                                        <!-- <li>
                                            <a href="public/user/checkout.html">Thủ tục thanh toán</a>
                                        </li> -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle start -->
            <div class="header-middle-area pt-20 pb-20">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="brand-logo">
                                <a href="index.php">
                                    <img src="public/user/assets/img/logo/logo.png" alt="brand logo">
                                </a>
                            </div>
                        </div> <!-- end logo area -->
                        <div class="col-lg-9">
                            <div class="header-middle-right">
                                <div class="header-middle-shipping mb-20">
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>Thời gian làm việc</h5>
                                            <span>Hàng ngày: 8:00 AM - 20:00 PM</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>Miễn phí vận chuyển</h5>
                                            <span>Phạm vi toàn quốc</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>Hoàn tiền 100%</h5>
                                            <span>Trong thời gian 10 ngày</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                </div>
                                <div class="header-middle-block">
                                    <div class="header-middle-searchbox">
                                        <form action="?c=TKiem" method="POST">
                                        <input type="text" placeholder="Tìm kiếm..."  name="tukhoa">
                                        <button class="search-btn" value="Timkiem" name="Timkiem"><i class="fa fa-search"></i></button>
                                        <!-- <input type="submit" name="timkiem" value="timkiem"> -->
                                        </form>
                                    </div>
                                    <div class="header-mini-cart">
                                        <div class="mini-cart-btn">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span class="cart-notification">+</span>
                                        </div>
                                        <a href="?c=giohang">
                                        <div class="cart-total-price pt-10">
                                        Giỏ Hàng
                                        </div>
                                        </a>
                                        <!-- <ul class="cart-list">
                                            <li>
                                                <div class="cart-img">
                                                    <a href="product-details.html"><img src="public/user/assets/img/cart/cart-1.jpg"
                                                            alt=""></a>
                                                </div>
                                                <div class="cart-info">
                                                    <h4><a href="product-details.html">simple product 09</a></h4>
                                                    <span>$60.00</span>
                                                </div>
                                                <div class="del-icon">
                                                    <i class="fa fa-times"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-img">
                                                    <a href="product-details.html"><img src="public/user/assets/img/cart/cart-2.jpg"
                                                            alt=""></a>
                                                </div>
                                                <div class="cart-info">
                                                    <h4><a href="product-details.html">virtual product 10</a></h4>
                                                    <span>$50.00</span>
                                                </div>
                                                <div class="del-icon">
                                                    <i class="fa fa-times"></i>
                                                </div>
                                            </li>
                                            <li class="mini-cart-price">
                                                <span class="subtotal">subtotal : </span>
                                                <span class="subtotal-price">$88.66</span>
                                            </li>
                                            <li class="checkout-btn">
                                                <a href="#">checkout</a>
                                            </li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header middle end -->

            <!-- main menu area start -->
            <div class="main-header-wrapper bdr-bottom1">
                <div class="container">
                    <div class="row">
                        <div style="width: 71.434%;">
                            <div class="main-header-inner">
                                <div class="category-toggle-wrap">
                                    <div class="category-toggle">
                                        Danh mục
                                        <div class="cat-icon">
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                    </div>
                                    <nav class="category-menu"><!--hm-1(tự động)-->
                                        <ul>
                                        <?php 
                                          if(!empty($list))
                                          foreach($list as $row):
                                         ?>
                                            <li><a href="?c=list&id=<?php echo $row['iddm']?>"><i class="fa fa-laptop"></i><?php echo $row['tendm']; ?></a></li>

                                          <?php endforeach; ?>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                        <li class="active"><a href="index.php">Trang chủ</a></li>
                                            <li class="static"><a href="?c=sanpham&per_page=5&page=1">Sản phẩm</a>
                                            </li>
                                            <li><a href="?c=tintuc&per_page=6&page=1">Tin công nghệ</i></a></li>
                                            <li><a href="?c=lienhe">Liên hệ hổ trợ</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-10 d-block d-lg-none">
                            <div class="mobile-menu"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- main menu area end -->

        </header>
        <!-- header area end -->