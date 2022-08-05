<title>Quản lý bình luận</title>
<?php
$comment = Database::db_get_list("select * from comments,user,categorysub where comments.idnd=user.idnd and comments.idsub=categorysub.idsub order by idcm desc");
?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">2 bảng</h1>
    <p class="mb-4">Bảng 1: Quản lý các bình luận của trang giới thiệu và học tập</a>.</p>
    <p class="mb-4">Bảng 2: Quản lý các bình luận của trang bài viết</a>.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng 1: GIỚI THIỆU VÀ KHÓA HỌC</h6>
        </div>
        <!-- <div class="card-body"> -->
        <div class="table-responsive">
            <div class="col">
                <div class="col-sm-12 mt-2 mb-2">
                    <table class="table table-hover table-bordered" id="myTable">
                        <thead>
                            <tr class="Bg-primary text-white text-center">
                                <th>ID</th>
                                <th width="15%">Tên người dùng</th>
                                <th width="15%">Nội dung</th>
                                <th width="30%">Bài tập</th>
                                <!-- <th width="30%">Bài viết</th> -->
                                <th class="text-center">
                                    Thao tác
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $idcm = 1;
                            if (!empty($comment))
                                foreach ($comment as $cm) :
                            ?>
                            <tr>
                                <td><?php echo $idcm; ?></td>
                                <td><?php echo $cm['hoten']; ?></td>
                                <td><?php echo $cm['message']; ?></td>
                                <td><?php echo $cm['tensub']; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo Helper::get_url("learn?c=gioithieukhoahoc&id=" . $cm['idsub']); ?>#comments_tg"
                                        class="btn btn-outline-success text-danger">Xem</a>
                                    <a href="<?php echo Helper::get_url("Admincp?c=deletecm&id=" . $cm['idcm']); ?>"
                                        class="btn btn-outline-danger">Xóa</a> &nbsp;&nbsp;
                                </td>
                            </tr>
                            <?php
                                    $idcm++;
                                endforeach;
                            ?>
                            </thead>
                    </table>
                </div>
            </div>
            <?php
            $comments = Database::db_get_list("select * from comments,user,news where comments.idnd=user.idnd and comments.idtt=news.idtt order by idcm desc");
            ?>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bảng 2: BÀI VIẾT</h6>
            </div>

            <!-- <div class="card-body"> -->
            <div class="table-responsive">
                <div class="col">
                    <div class="col-sm-12 mt-2 mb-2">
                        <table class="myTable2 table table-hover table-bordered">
                            <thead>
                                <tr class="text-white text-center" style="background:#6c757d;">
                                    <th>ID</th>
                                    <th width="15%">Tên người dùng</th>
                                    <th width="15%">Nội dung</th>
                                    <th width="30%">Bài viết</th>
                                    <th class="text-center">
                                        Thao tác
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $idcm = 1;
                                if (!empty($comments))
                                    foreach ($comments as $cm) :
                                ?>
                                <tr>
                                    <td><?php echo $idcm; ?></td>
                                    <td><?php echo $cm['hoten']; ?></td>
                                    <td><?php echo $cm['message']; ?></td>
                                    <td><?php echo $cm['tieude']; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo Helper::get_url("learn?c=chitietbaiviet&id=" . $cm['idtt']); ?>#comments_tg"
                                            class="btn btn-outline-success text-danger">Xem</a>
                                        <a href="<?php echo Helper::get_url("Admincp?c=deletecm&id=" . $cm['idcm']); ?>"
                                            class="btn btn-outline-danger">Xóa</a> &nbsp;&nbsp;
                                    </td>
                                </tr>
                                <?php
                                        $idcm++;
                                    endforeach;
                                ?>
                                </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>