<?php
$sql = "select * from videos where idsub='$_GET[id]'";
$videos = Database::db_get_list($sql);
if (!empty($_GET["id"])) {
    $so_luot_xem =  Helper::input_value("so_luot_xem");
    $sql = "update categorysub set so_luot_xem=so_luot_xem+1 where idsub='$_GET[id]'";
    $params = [
        "so_luot_xem" => $so_luot_xem,
    ];
}
Database::db_execute($sql, $params);
?>
<title>Khóa học</title>
<link rel="stylesheet" href="public/user/assets/css/lglo.css">
<style>
.slidebar,
.footer,
.copyright,
.panel-header,
.back-to-top {
    display: none !important;
}
</style>

<div class="top-color-header"
    style="display: flex;justify-content: flex-start;align-items:center;position: fixed;z-index:2;">
    <div id="toggleBtn"></div>
    <!-- // onclick="history.back(-1)" -->
    <a href="?c=khoahoc" title="Rời khỏi đây">
        <div class="un-hover d-flex-center">
            <i class="fas fa-chevron-left" style="color: #ccc;"></i>
        </div>
    </a>
    <img style="cursor:pointer;" class="ml-3" src="public/user/assets/img/iOTEAM-logo1.png" alt="iOTEAM"
        width="100em">&nbsp&nbsp&nbsp|<span class="title-vd ml-3">
        <?php
        $sql = "select * from categorysub where idsub='$_GET[id]'";
        $danhmucsub = Database::db_get_list($sql);
        if (!empty($danhmucsub))
            foreach ($danhmucsub as $ds) :
        ?>
        <option value="<?php echo $ds['idsub']; ?>">
            <?php echo $ds['tensub']; ?>
        </option>
        <?php
            endforeach;
        ?>
    </span>
</div>
<div class="container-v mt-5">
    <div class="main-video">
        <div class="video mt-4">
            <iframe id="video-embed" width="100%" height="555"
                src="https://www.youtube.com/embed/<?php echo $videos[0]['video_url']; ?>" frameborder="0"
                allowfullscreen allowtransparency="true"></iframe>
        </div>
        <hr>
        <div class="main-video-comment">
            <?php
            $comments = Database::db_get_list("select * from comments,user where comments.idnd=user.idnd and idsub='$_GET[id]' order by idcm desc");
            ?>
            <div class="p-3">
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
                            <p><a href="#" class="reply" style="display:inline;">Trả lời</a></p>
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
                <form action="#" class="bg-light" method="post" style="width: 100%;" id="add_form"
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
                <a href="account/dangnhap" style="Display:inline;"><span>Đăng nhập</span></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="video-list">
        <div class="d-flex-center">
            <b><?php echo $ds['sl_bai']; ?></b>&nbsp bài học</p>
        </div>
        <ul style="margin-bottom: 4rem!important;">
            <?php $stt = 1;
            foreach ($videos as $v) { ?>
            <!-- <hr> -->
            <li class="item vid" id="<?php echo $v['video_url']; ?>"
                onclick="playVideo('<?php echo $v['video_url']; ?>')">
                <p class="title-v">
                    <?php echo $stt; ?>. <?php echo $v['tenvd']; ?>
                </p>
            </li>
            <?php $stt++;
            } ?>
        </ul>
    </div>
    <!-- </div> -->

    <script type="text/javascript">
    document.getElementsByClassName('item')[0].classList.add('active');

    function playVideo(id) {
        items = document.getElementsByClassName('item');
        for (i = 0; i < items.length; i++) {
            items[i].classList.remove("active");
        }
        document.getElementById(id).classList.add('active');
        src = 'https://www.youtube.com/embed/' + id +
            '?modestbranding=1&ecver=1&autoplay=1&iv_load_policy=3&rel=0&showinfo=0&yt:stretch=16:9&autohide=1';
        document.getElementById('video-embed').setAttribute('src', src);
    }
    </script>