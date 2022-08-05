<?php

   if(!Role::is_user()){
      Helper::redirect(Helper::get_url('?c=logout'));
   }
?>
<?php
    include'../DA_WebsLaptop/Admincp/view/common/dbconfig.php';
    $id = !empty($_GET['id']) ? (Int)$_GET['id'] : 0;
    $soluong = !empty($_GET['soluong']) ? (Int)$_GET['soluong'] : 1;
    $action = !empty($_GET['action']) ? (Int)$_GET['action'] : 'add';
    $query = mysqli_query($connection,"SELECT * FROM sanpham where idsp=$id");
    $pro = mysqli_fetch_object($query);
    
    if($pro && $action =='add'){
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['soluong'] +=$soluong;
        }
        else{
        $item = [
            'id'=>$pro->idsp,
            'masp'=>$pro->masp,
            'name'=>$pro->tensp,
            'price'=>$pro->giasp,
            'images'=>$pro->anhsp,
            'soluong'=>$soluong
        ];
        $_SESSION['cart'][$id]=$item;
    }
}

    if($pro && $action == 'delete'){
    if(isset($_SESSION['cart'][$id])){
    unset($_SESSION['cart'][$id]);
    }
}
    if($action == 'update'){

    }
    if($action == 'clear'){

    }
    
    // echo '<pre>';
    // print_r($_SESSION['cart']);
    $sanpham = !empty($_SESSION['cart']) ? $_SESSION['cart']:[];
?>
<?php  ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <!-- Site title -->
    <title>Giỏ hàng</title>
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
                                    
                                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <form action="sanpham?action=submit">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="pro-thumbnail">Hình ảnh</th>
                                    <th class="pro-title">Tên sản phẩm</th>
                                    <th class="pro-price">Giá</th>
                                    <th class="pro-quantity">Số lượng</th>
                                    <th class="pro-subtotal">Tổng</th>
                                    <th class="pro-remove">Xoá</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        
                                        foreach($sanpham as $item):
                                            $thanh_tien = $item['price'] * $soluong
                                        ?>
                                <tr>
                                    <td class="pro-thumbnail"><img src="uploads/<?php echo $item['images']; ?>" class="img-pri" alt=""></td>
                                    <td class="pro-title"><?= $item['name']?></td>
                                    <td class="pro-price"><span><?=number_format($item['price'],0,',','.')?>VNĐ</span></td>
                                    <td class="pro-quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1" name="soluong[=<? $item['id'] ?>]"/>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span><?=number_format($thanh_tien)?>VNĐ</span></td>
                                    <td class="pro-remove"><a href="?c=giohang&id=<?php echo $item['id'] ?>&action=delete"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                            </form>
                        </div>
        
                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-between border-0">
                            <div class="cart-update mt-sm-16">
                                <a href="#" class="sqr-btn ">Cập nhật giỏ</a>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h3>Tổng thanh toán</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Thành tiền</td>
                                            <td>230 VNĐ</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="checkout.html" class="sqr-btn d-block">Xác nhận thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->

        <!-- brand area start -->
        <div class="brand-area pt-34 pb-30">
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

</body>


</html>