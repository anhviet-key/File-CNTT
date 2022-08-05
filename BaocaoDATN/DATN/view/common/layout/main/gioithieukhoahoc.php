<?php
$sql = "select * from categorysub where idsub='$_GET[id]'";
$listsub = Database::db_get_list($sql);
if (!empty($listsub))
    foreach ($listsub as $rows) :
?>

<head>
    <title><?php echo $rows['tensub'] ?></title>
</head>

<body>
    <div id="colorlib-main">
        <div class="bg-images" style="background-image:url(public/user/assets/img/code.jpg);">
            <h3 class="title-heading">Tất cả khóa học</h3>
            <p class="title-heading">Hàng trăm khóa học miễn phí được xây dựng bởi iOTeam và cộng đồng!</p>
        </div>
        <!-- <div class="container"> -->
        <div class="row d-flex mt-5 pd-5">
            <div class="col-lg-12 px-md-5">
                <a href='?c=listvideo&id=<?php echo $rows["idsub"] ?>'><button
                        class="btn--courses mx-6 ml-1 d-flex-center" style="float:right"><i
                            class="far fa-caret-square-right"></i>&nbspBắt đầu vào bài học</button></a>
                <h1 class="mb-3"><?php echo $rows['tensub'] ?></h1>
                <?php require 'Admincp/view/common/dbconfig.php'; ?>
                <span style="color:rgb(0 123 255 / 50%)"><a href="#comments_tg"><i class="icon-comment2 mr-2"></i><i
                            class="fas fa-comments"></i></a>
                    <?php
                        $query = "SELECT idcm from comments where idsub='$_GET[id]' order by idcm";
                        $query_run = mysqli_query($connection, $query);
                        $row = mysqli_num_rows($query_run);
                        echo $row;
                        ?>
                    Bình luận</span>
                <div class="w-100">
                    <hr>
                    <span><?php echo $rows['mota']; ?></span>
                </div>
                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        <a href="#" class="tag-cloud-link">Công nghệ</a>
                        <a href="#" class="tag-cloud-link">Khóa học</a>
                        <a href="#" class="tag-cloud-link">Lập trình</a>
                        <a href="#" class="tag-cloud-link">Hỏi đáp</a>
                        <?php
                            $comments = Database::db_get_list("select * from comments,user where comments.idnd=user.idnd and idsub='$_GET[id]' order by idcm desc");
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
                                        <p><a href="#" class="reply">Trả lời</a></p>
                                    </div>
                                </li>
                            </ul>
                            <!-- END comment-list -->
                            <?php endforeach; ?>
                        </div>
                        <?php
                            if (Helper::is_submit("add_cm")) {
                                $idnd =  $_SESSION['user'][0];
                                $idsub =  $_GET['id'];
                                $idtt =  Helper::input_value("idsub");

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

        </div>
    </div>
    </div><!-- END COLORLIB-MAIN -->

</body>

</html>