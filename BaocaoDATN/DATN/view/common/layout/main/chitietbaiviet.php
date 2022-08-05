<?php
$sql = "select * from news where idtt='$_GET[id]' LIMIT 1";
$listtt = Database::db_get_list($sql);
if (!empty($listtt))
    foreach ($listtt as $rows) :
?>

<head>
    <title>
        <?php echo $rows['tieude'] ?>
    </title>
</head>
<div id="colorlib-main">
    <div class="row">
        <div class="col-12">
            <div class="bg-images" style="background-image:url(public/user/assets/img/code.jpg);">
                <h3 class="title-heading">Tất cả bài viết</h3>
                <p class="title-heading">Hàng trăm bài viết được xây dựng bởi iOTeam và cộng đồng!</p>
            </div>
        </div>
        <div class="row d-flex pd-5">
            <div class="col-lg-8 px-md-5">
                <div class="row pt-md-4 p-3">
                    <h1 class="mb-3">
                        <?php echo $rows['tieude'] ?>
                    </h1>
                    <div class="meta-wrap"
                        style="color: #17a2b8;background-color:#cccccc2e;width:100%;text-align:center">
                        <b class="meta">
                            <span><i class="fas fa-clock"></i> <?php $date = date("d-m-Y", strtotime($rows["ngaythemtt"]));
                                                                    echo $date ?></span>&nbsp&nbsp&nbsp<i
                                class="fas fa-ellipsis-v"></i>&nbsp
                            <?php require 'Admincp/view/common/dbconfig.php'; ?>
                            <span><a href="#comments_tg"><i class="icon-comment2 mr-2"></i><i
                                        class="fas fa-comments"></i></a>
                                <?php
                                    $query = "SELECT idcm from comments where idtt='$_GET[id]' order by idcm";
                                    $query_run = mysqli_query($connection, $query);
                                    $row = mysqli_num_rows($query_run);
                                    echo $row;
                                    ?>
                                Bình luận</span>
                        </b>
                    </div>
                    <div class="w-100">
                        <?php echo $rows['preview']; ?>
                        <hr>
                        <span><?php echo $rows['noidung']; ?></span>
                    </div>
                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">Công nghệ</a>
                            <a href="#" class="tag-cloud-link">Khóa học</a>
                            <a href="#" class="tag-cloud-link">Thủ thuật</a>
                        </div>
                        <?php
                            $comments = Database::db_get_list("select * from comments,user where comments.idnd=user.idnd and idtt='$_GET[id]' order by idcm desc");
                            ?>
                        <div class="pt-5 mt-5 p-3" id="comments_tg">
                            <h3 class="mb-5 font-weight-bold">Bình luận</h3>
                            <?php if (!empty($comments))
                                    foreach ($comments as $cm) :
                                ?>
                            <ul class="comment-list">
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="uploads/<?php echo $cm['anhnd']; ?>" alt="Image"
                                            style="object-fit: cover;width:4em;height:4em;">
                                    </div>
                                    <div class="comment-body">
                                        <h3>
                                            <?php echo $cm['hoten'] ?>
                                        </h3>
                                        <div class="meta">
                                            <?php $date = date("d-m-Y H:i:s a", strtotime($cm["date"]));
                                                    echo $date ?>
                                        </div>
                                        <p>
                                            <?php echo $cm['message'] ?>
                                        </p>
                                        <p><a type="button" class="reply">Trả lời</a></p>
                                        <div class="mt-1 reply-section"></div>
                                    </div>
                                </li>
                            </ul>
                            <!-- END comment-list -->
                            <?php endforeach; ?>
                        </div>
                        <?php
                            if (Helper::is_submit("add_cm")) {
                                $idnd =  $_SESSION['user'][0];
                                $idsub =  Helper::input_value("idsub");
                                $idtt =  $_GET['id'];

                                $message =  Helper::input_value("message");
                                $sql = "insert into comments(idnd,idsub,idtt,message) 
                                                        values(:idnd,:idsub,:idtt,:message)";
                                $params = [
                                    "idnd" => $idnd,
                                    "idsub" => $idsub,
                                    "idtt" => $idtt,
                                    "message" => $message
                                ];

                                if (Database::db_execute($sql, $params)) {
                                    Helper::redirect("#");
                                }
                            }
                            ?>
                        <div class="comment-form-wrap pt-5">
                            <?php
                                if (isset($_SESSION['user'])) { ?>
                            <h3 class="mb-5">Để lại bình luận</h3>
                            <form action="#" class="p-3 p-md-5 bg-light" method="post" id="add_form"
                                enctype="multipart/form-data">
                                <input type="hidden" name="action" value="add_cm">
                                <div class="form-group">
                                    <label for="message">Nội dung</label>
                                    <textarea name="message" id="message" cols="80" rows="5" class="form-control"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Gửi bình luận" class="btn py-3 px-4 btn-primary">
                                </div>
                            </form>
                            <?php } else { ?>
                            <label for="message">Đăng nhập để có thể bình luận</label>
                            <a href="account/dangnhap"><span>Đăng nhập</span></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
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
<script>
$(document).ready(function() {
    $(document).on('click', '.reply', function() {
        var thisClicked = $(this);
        var cmt_id = thisClicked;
        $('.reply-section').html("");
        thisClicked.closest('.comment-body').find('.reply-section').append(
            '<form action="#" class="p-3 p-md-5 bg-light" method="post" id="add_form" enctype = "multipart/form-data" > \
                <input type = "hidden" name = "action" value = "add_cm" > \
                <div class = "form-group" > <label for = "message" > Nội dung </label>\ <textarea name = "message" id = "message" cols = "80" rows = "5" class = "form-control" required > </textarea>\  </div > <div class = "form-group" > <input type = "submit" value = "Gửi bình luận" class = "btn py-3 px-4 btn-primary" ></div> </form > '
        );
    });
});
</script>