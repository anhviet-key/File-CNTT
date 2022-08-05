<?php
$sql = "select * from news order by idtt DESC";
$listtt = Database::db_get_list($sql);
?>

<title>Bài viết</title>
<style>
.read-more {
    display: none;
}
</style>
<div id="colorlib-main">
    <div class="row">
        <div class="col-12">
            <div class="bg-images" style="background-image:url(public/user/assets/img/code.jpg);">
                <h3 class="title-heading">Tất cả bài viết</h3>
                <p class="title-heading">Hàng trăm bài viết được xây dựng bởi iOTeam và cộng đồng!</p>
            </div>
        </div>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <div>
            <section>
                <!-- //ftco-section ftco-no-pt ftco-no-pb -->
                <!-- <div class="container"> -->
                <div class="row">
                    <div class="col-xl-8 py-5 px-md-5 p-3" style="padding-top:0%!important">
                        <?php
                        if (!empty($listtt))
                            foreach ($listtt as $rows) :
                        ?>
                        <div class="row read-more pt-md-4 p-3">
                            <div class="blog-entry d-md-flex">
                                <a href="?c=chitietbaiviet&id=<?php echo $rows["idtt"] ?>" class="img img-2"
                                    style="background-image: url(uploads/<?php echo $rows['anhtt']; ?>);"></a>
                                <div class="text text-2 pl-md-4">
                                    <h3 class="mb-2"><a
                                            href="?c=chitietbaiviet&id=<?php echo $rows["idtt"] ?>"><?php echo $rows['tieude']; ?></a>
                                    </h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="icon-calendar mr-2"></i><?php $date = date("d-m-Y", strtotime($rows["ngaythemtt"]));
                                                                                        echo $date ?></span>
                                            <span><a href="?c=chitietbaiviet&id=<?php echo $rows["idtt"] ?>"><i
                                                        class="icon-folder-o mr-2"></i>Bài viết</a></span>
                                            <!-- <span><i class="icon-comment2 mr-2"></i>5 Comment</span> -->
                                        </p>
                                    </div>
                                    <p class="mb-4"><?php echo $rows['preview']; ?></p>
                                    <p><a href="?c=chitietbaiviet&id=<?php echo $rows["idtt"] ?>" class="btn-custom">Đọc
                                            thêm... <span class="ion-ios-arrow-forward"></span></a></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <!-- END-->
                        <div class="row">
                            <div class="col d-flex-center">
                                <!-- <div class="d-flex-center"> -->
                                <button class="btn-more glow-on-hover mb-2" type="button">Xem thêm...</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 sidebar bg-light pt-5">
                        <div class="sidebar-box pt-md-4 p-3">
                            <div class="boxx">
                                <form action="?c=timkiembaiviet" method="POST">
                                    <input type="text" placeholder="Type..." name="tukhoa" required>
                                    <input type="submit" value="Tìm kiếm" name="Timkiem" class="ip-none"
                                        style="margin-left:5px">
                                </form>
                            </div>
                            <!-- </div> -->
                        </div>
                        <?php
                        $sql = "select * from news order by idtt desc limit 5";
                        $lists = Database::db_get_list($sql);
                        ?>
                        <div class="sidebar-box p-3">
                            <h3 class="sidebar-heading">Bài viết mới</h3>

                            <?php
                            if (!empty($lists))
                                foreach ($lists as $row) :
                            ?>
                            <div class="block-21 mb-4 d-flex">
                                <a href="?c=chitietbaiviet&id=<?php echo $row["idtt"] ?>" class="blog-img mr-4"
                                    style="background-image: url(uploads/<?php echo $row['anhtt']; ?>);"></a>
                                <div class="text">
                                    <h3 class="heading"><a
                                            href="?c=chitietbaiviet&id=<?php echo $row["idtt"] ?>"><?php echo $row['tieude']; ?></a>
                                    </h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span><?php $date = date("d-m-Y", strtotime($row["ngaythemtt"]));
                                                                                                echo $date ?></a></div>
                                        <!-- <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                                            <div><a href="#"><span class="icon-chat"></span> 19</a></div> -->
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <div class="sidebar-box">
                                <h3 class="sidebar-heading">Tag Cloud</h3>
                                <ul class="tagcloud">
                                    <a href="#" class="tag-cloud-link">Lập trình</a>
                                    <a href="#" class="tag-cloud-link">Hỏi đáp</a>
                                    <a href="#" class="tag-cloud-link">Python</a>
                                    <a href="#" class="tag-cloud-link">C#</a>
                                    <a href="#" class="tag-cloud-link">Office</a>
                                    <a href="#" class="tag-cloud-link">Github</a>
                                    <a href="#" class="tag-cloud-link">Android</a>
                                    <a href="#" class="tag-cloud-link">Unity</a>
                                </ul>
                            </div>

                            <div class="sidebar-box subs-wrap img py-4"
                                style="background-image: url(public/user/assets/img/bg_1.jpg);">
                                <div class="overlay"></div>
                                <h3 class="mb-4 sidebar-heading">iOTeam</h3>
                                <p class="mb-4">Mọi thắc mắc xin liên hệ qua:</p>
                                <form action="#" class="subscribe-form">
                                    <div class="form-group">
                                        <a href="mailto:anhviet.key@gmail.com"><input value="anhviet.key@gmail.com"
                                                class="mt-2 btn btn-yellow submit"></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END COL -->
                    </div>
                </div>
            </section>
        </div>
        <!-- END COLORLIB-MAIN -->
    </div>
    <!-- END COLORLIB-PAGE -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(".read-more").slice(0, 8).show()
    $(".btn-more").on("click", function() {
        $(".read-more:hidden").slice(0, 8).slideDown()
        if ($(".read-more:hidden").length == 0) {
            $(".btn-more").fadeOut('slow')
        }
    })
    </script>