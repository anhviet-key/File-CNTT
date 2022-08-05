<?php
$sql = "select * from tintuc where matt='$_GET[id]' LIMIT 1";
$listtt = Database::db_get_list($sql);
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
                                    <li class="breadcrumb-item"><a href="?c=tintuc&per_page=6&page=1">Tin tức</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">chi tiết blog</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- blog main wrapper start -->
        <div class="blog-main-wrapper">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="blog-wrapper-inner">
                            <div class="row blog-content-wrap">
                                <!-- start single blog item -->
                                <?php 
                                 if(!empty($listtt))
                                 foreach($listtt as $rows):
                                ?>
                                <div class="col-lg-12">
                                    <div class="blog-item mb-30">
                                        <div class="blog-thumb img-full fix">
                                            <div class="blog-gallery-slider slick-arrow-style_2">
                                                <div class="blog-single-slide">
                                                    <img src="uploads/<?php echo $rows['anhtt']; ?>" alt="" style="height: 350px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-details">
                                                <h3 class="blog-heading"><?php echo $rows['tieude'] ?></h3>
                                                <div class="blog-meta">
                                                    <a class="author" href="#"><i class="icon-people"></i> Admin</a>
                                                
                                                    <a class="post-time" href="#"><i class="icon-calendar"></i><?php echo $rows['ngaythemtt']; ?></a>
                                                </div>
                                                <h6><?php echo $rows['noidung']; ?></h6>
                                                
                                            </div>
                                        </div>
                                        <div class="blog-sharing text-center mt-34 mt-sm-34">
                                            <h4>Chia sẻ bài đăng này:</h4>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-pinterest"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <!-- <div class="comment-section">
                                        <h3>03 comment</h3>
                                        <ul>
                                            <li>
                                                <div class="author-avatar">
                                                    <img src="public/user/assets/img/blog/comment-icon.png" alt="">
                                                </div>
                                                <div class="comment-body">
                                                        <span class="reply-btn"><a href="#">reply</a></span>
                                                    <h5 class="comment-author">admin</h5>
                                                    <div class="comment-post-date">
                                                        20 nov, 2018 at 9:30pm
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                                </div>
                                            </li>
                                            <li class="comment-children">
                                                <div class="author-avatar">
                                                    <img src="public/user/assets/img/blog/comment-icon.png" alt="">
                                                </div>
                                                <div class="comment-body">
                                                        <span class="reply-btn"><a href="#">reply</a></span>
                                                    <h5 class="comment-author">admin</h5>
                                                    <div class="comment-post-date">
                                                        20 nov, 2018 at 9:30pm
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="author-avatar">
                                                    <img src="public/user/assets/img/blog/comment-icon.png" alt="">
                                                </div>
                                                <div class="comment-body">
                                                    <span class="reply-btn"><a href="#">reply</a></span>
                                                    <h5 class="comment-author">admin</h5>
                                                    <div class="comment-post-date">
                                                        20 nov, 2018 at 9:30pm
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> -->
                                    <!-- comment area start -->
                                    <!-- start blog comment box -->
                                    <!-- <div class="blog-comment-wrapper mb-sm-6">
                                        <h3>leave a reply</h3>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <form action="#">
                                            <div class="comment-post-box">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label>comment</label>
                                                        <textarea name="commnet" placeholder="Write a comment"></textarea>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 mb-sm-20">
                                                        <label>Name</label>
                                                        <input type="text" class="coment-field" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 mb-sm-20">
                                                        <label>Email</label>
                                                        <input type="text" class="coment-field" placeholder="Email">
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="coment-btn mt-20">
                                                            <input class="sqr-btn" type="submit" name="submit" value="post comment">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div> -->
                                    <!-- start blog comment box -->
                                </div>
                                <!-- end single blog item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog main wrapper end -->

        <!-- brand area start -->
        <div class="brand-area pt-34 pt-sm-10 pb-30">
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