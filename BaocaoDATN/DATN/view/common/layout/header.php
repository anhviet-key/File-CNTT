<?php
$sql = "select * from category order by iddm DESC";
$listss = Database::db_get_list($sql);
?>

<div class="panel-header">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php
                if(isset($_SESSION['user'])){?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn-white shadow-warning text-warning" href="#" id="dropdown01"
                        data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?php echo $_SESSION['user'][3] ?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item page-scroll" href="?c=manage"><i class="far fa-id-badge w-20"></i> Hồ
                            sơ</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="?c=manage"><i class="fas fa-user-cog w-20"></i> Cài
                            đặt</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="account/dangxuat.php"><i
                                class="fas fa-sign-out-alt w-20"></i> Đăng xuất</a>
                    </div>
                </li>
            </ul>
            <?php }else{ ?>
            <ul class="navbar-nav ml-auto">
                <div class="d-flex-center">
                    <span class="fa-stack">
                        <a href="#" title="todo">
                            <!-- <i class="fas fa-tasks fa-stack-1x"></i> -->
                        </a>
                    </span>
                </div>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn-white shadow-warning text-warning" href="#" id="dropdown01"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài khoản</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item page-scroll" href="account/dangnhap"><i class="far fa-user"></i> Đăng
                            nhập</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item page-scroll" href="account/dangky"><i class="fas fa-user"></i></i> Đăng
                            ký</a>
                    </div>
                </li>
            </ul>
            <?php } ?>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="https://www.facebook.com/NguyenIAnhIViet" target="_blank" title="Facebook">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="https://twitter.com/Nguyen_Anh_Viet" target="_blank" title="Facebook">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        </div>
        <!-- end of navbar-collapse -->
</div>
<!-- end of container -->
</nav>
<!-- end of navbar -->
<!-- end of navigation -->
</div>