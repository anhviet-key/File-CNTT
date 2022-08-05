<title>Bài viết</title>
<style>
.read-more {
    display: none;
}
</style>
<?php
if (isset($_POST['Timkiem']))
    $tukhoa = $_POST['tukhoa'];
$sql = "SELECT * FROM news where tieude LIKE '%" . $tukhoa . "%'";
$lists = Database::db_get_list($sql);
if (empty($tukhoa)) {
    Helper::redirect(Helper::get_url('index.php'));
}
if (empty($lists)) {
    echo '<script>
            swal({
                title: "Xin lỗi!",
                text: "Không có dữ liệu về từ khóa",
                icon: "warning",
                button: "Trở lại",
              });</script>';
    $sql = "SELECT * FROM news order by idtt DESC";
    $lists = Database::db_get_list($sql);
}
?>
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
                                    <li class="breadcrumb-item active" aria-current="page">Từ khóa: <span
                                            class="text-success"><?php echo $_POST['tukhoa']; ?></span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <div>
            <div class="row">
                <div class="col-xl-12 py-5 px-md-5 p-3" style="padding-top:0%!important">
                    <?php
                    if (!empty($lists))
                        foreach ($lists as $rowss) :
                    ?>
                    <div class="row read-more pt-md-4 p-3">
                        <div class="blog-entry d-md-flex">
                            <a href="?c=chitietbaiviet&id=<?php echo $rowss["idtt"] ?>" class="img img-2"
                                style="background-image: url(uploads/<?php echo $rowss['anhtt']; ?>);"></a>
                            <div class="text text-2 pl-md-4">
                                <h3 class="mb-2"><a
                                        href="?c=chitietbaiviet&id=<?php echo $rowss["idtt"] ?>"><?php echo $rowss['tieude']; ?></a>
                                </h3>
                                <div class="meta-wrap">
                                    <p class="meta">
                                        <span><i class="icon-calendar mr-2"></i><?php $date = date("d-m-Y", strtotime($rowss["ngaythemtt"]));
                                                                                        echo $date ?></span>
                                        <span><a href="?c=chitietbaiviet&id=<?php echo $rowss["idtt"] ?>"><i
                                                    class="icon-folder-o mr-2"></i>Bài viết</a></span>
                                    </p>
                                </div>
                                <p class="mb-4"><?php echo $rowss['preview']; ?></p>
                                <p><a href="?c=chitietbaiviet&id=<?php echo $rowss["idtt"] ?>" class="btn-custom">Read
                                        More <span class="ion-ios-arrow-forward"></span></a></p>
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
            </div>
            <!-- </section> -->
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