<?php
include_once('model/helper.php');
$db = new Database();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iOTeam</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap"
        rel="stylesheet">
    <link href="public/user/assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet " href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css "
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer " />
    <link href="public/user/assets/css/swiper.css" rel="stylesheet">
    <link href="public/user/assets/css/magnific-popup.css" rel="stylesheet">
    <link href="public/user/assets/css/styles.css" rel="stylesheet">
    <link href="public/user/assets/css/loader.css" rel="stylesheet">
    <!-- icon  -->
    <link rel="icon" href="public/user/assets/img/iOTEAM-rel-icon.png">
</head>


<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="#"><img src="public/user/assets/img/iOTEAM-logo.png"
                    alt="iOTEAM"></a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse mt-4" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto my-auto mx-n5" style="position: absolute;display: contents;">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="http://localhost/DATN/learn?c=gioithieu">Giới thiệu<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="http://localhost/DATN/learn?c=khoahoc">Khóa học</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="http://localhost/DATN/learn?c=baiviet">Bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="http://localhost/DATN/learn?c=taitro">Tài trợ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="http://localhost/DATN/learn?c=lienhe">Liên hệ</a>
                    </li>

                </ul>

                <?php
                if (isset($_SESSION['user'])) { ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn-white shadow-warning text-warning" href="#"
                            id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><?php echo $_SESSION['user'][3] ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item page-scroll" href="http://localhost/DATN/learn?c=manage"><i
                                    class="far fa-id-badge w-20"></i> Hồ sơ</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="http://localhost/DATN/learn?c=manage"><i
                                    class="fas fa-user-cog w-20"></i> Cài đặt</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="account/dangxuat"><i
                                    class="fas fa-sign-out-alt w-20"></i> Đăng xuất</a>
                        </div>
                    </li>
                </ul>
                <?php } else { ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn-white shadow-warning text-warning" href="#"
                            id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài
                            khoản</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item page-scroll" href="account/dangnhap"><i class="far fa-user"></i>
                                Đăng nhập</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="account/dangky"><i class="fas fa-user"></i></i>
                                Đăng ký</a>
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

    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" style="border-radius: 50%;" src="public/user/assets/img/iOTEAM.gif"
                            alt="alternative">
                    </div>
                    <!-- end of image-container -->
                </div>
                <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h3>Thư viện khóa học lập trình từ cơ bản đến nâng cao</h3>
                        <h6 style="color: #ddd;opacity: 0.6">Python ? C++? C# hay Java? Bạn lựa chọn ngôn ngữ nào để bắt
                            đầu chặng đường trở thành lập trình viên của mình?</h6>
                        <a class="btn-solid-lg page-scroll" href="http://localhost/DATN/learn">Bắt đầu</a>
                    </div>
                    <!-- end of text-container -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
        <div class="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Tầm nhìn</h5>
                                <div class="card-text">Định hướng công việc phù hợp,
                                    biết cách đặt cho mình một mục tiêu rõ ràng cần thiết để phát triển sự nghiệp.</div>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <i class="fas fa-pencil-ruler"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Bạn nhận được gì từ iOTeam</h5>
                                <div class="card-text">1. Sự thành thạo</div>
                                <div class="card-text">2. Tính tự học</div>
                                <div class="card-text">3. Tiết kiệm thời gian</div>

                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Phát triển</h5>
                                <div class="card-text">iOTeam trân trọng mọi ý kiến đóng góp của bạn. Đừng ngại liên hệ
                                    khi bạn có bất kỳ câu hỏi nào.</div>
                            </div>
                        </div>
                        <!-- end of card -->

                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </div>
        <!-- end of services -->
    </header>
    <!-- end of header -->
    <!-- end of header -->
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
</body>
<!-- Scripts -->
<script src="public/user/assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="public/user/assets/js/jquery.easing.min.js"></script>
<!-- jQuery Easing for smooth scrolling between anchors -->
<script src="public/user/assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
<script src="public/user/assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
<script src="public/user/assets/js/scripts.js"></script> <!-- Custom scripts -->

<script>
$(window).on("load", function() {
    $(".loader-wrapper").fadeOut("slow");
});
</script>

</html>