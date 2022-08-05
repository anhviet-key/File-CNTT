<?php
   if(!Role::is_user()){
      Helper::redirect(Helper::get_url('?c=logout'));
   }
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <!-- Site title -->
    <title>User</title>

</head>
<body>
<div class="main-header-wrapper bdr-bottom1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Quản lý tài khoản</h3>
                                                <div class="welcome">                                             
                                                    
                                                    <form action="logout.php" method="POST">
                                                    <button type="text name="logout_btn" class="btn btn-primary"><a href="<?php echo Helper::get_url('?c=logout'); ?>">Đăng xuất</a></button>
                                                    </form>
                                                    <p>Xin chào, <strong><?php echo $_SESSION['email']?> !</strong>
                                                    </p>
                                                </div>
                                                <p class="mb-0">Khi bạn đã có tài khoản. Bạn có thể dễ dàng kiểm tra và xem các đơn đặt hàng gần đây, quản lý địa chỉ giao hàng và thanh toán cũng như chỉnh sửa mật khẩu và chi tiết tài khoản của mình.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                        </div>
                                     </div>
                                </div>
                        </div>
                </div>
    </div>
</body>

</html>