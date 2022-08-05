<title>Trang Quản Trị Hệ Thống</title>
<style>
.delete_hover {
    color: red;
    float: right
}

.delete_hover:hover {
    color: orange;
}
</style>
<?php require 'dbconfig.php'; ?>
<!-- Content Row -->
<div class="row">
    <!-- Tin Tuc Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bài viết</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Số lượng:
                            <?php
                            $query = "SELECT idtt from news order by idtt";
                            $query_run = mysqli_query($connection, $query);
                            $row = mysqli_num_rows($query_run);
                            echo $row;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-blog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Nguoi Dung Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Người Dùng</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Thành viên:
                            <?php
                            $query = "SELECT idnd from user";
                            $query_run = mysqli_query($connection, $query);
                            $row = mysqli_num_rows($query_run);
                            echo $row;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Đơn Hàng Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số bài học</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Số lượng: <?php
                                                                                                    $query = "SELECT idsub from categorysub";
                                                                                                    $query_run = mysqli_query($connection, $query);
                                                                                                    $row = mysqli_num_rows($query_run);
                                                                                                    echo $row;
                                                                                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thong Ke Doanh Thu Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Số lượt xem</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Tổng: <?php
                                                                                    $res = mysqli_query($connection, 'SELECT sum(so_luot_xem) FROM categorysub');
                                                                                    $row = mysqli_fetch_row($res);
                                                                                    $sum = $row[0];
                                                                                    echo $sum;
                                                                                    ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-eye fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<!-- Content Row -->
<?php
$comment = Database::db_get_list("select * from comments,user where comments.idnd=user.idnd order by idcm desc limit 5");
?>
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-7 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Bình Luận mới nhất</h6>
            </div>
            <!-- Card Body -->
            <div class="">
                <div class="review-block">
                    <?php
                    if (!empty($comment))
                        foreach ($comment as $cm) :
                    ?>
                    <div class="col-sm-auto p-r-0">
                        <img src="../uploads/<?php echo $cm['anhnd']; ?>" alt="Image"
                            style="object-fit: cover;width:4em;height:4em;border-radius:50%;">
                    </div>
                    <div class="col">
                        <h6 class="m-b-15"><?php echo $cm['hoten'] ?> <span class="float-right f-13 text-muted"
                                style="margin-top:-1.5em">
                                <?php $date = date("d-m-Y| H:i:s a", strtotime($cm["date"]));
                                    echo $date ?></span>
                        </h6>
                        <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                        <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                        <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                        <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                        <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                        <p class="m-t-15 m-b-15 text-muted"><?php echo $cm['message'] ?> <a
                                href="<?php echo Helper::get_url("Admincp?c=deletecm&id=" . $cm['idcm']); ?>"
                                class="m-r-30 text-muted"><i class="feather icon-thumbs-up m-r-15"></i><b
                                    class="delete_hover">Xóa</b></a></p>

                        <a href="#!"><i class="feather icon-heart-on text-c-red m-r-15"></i></a>
                        <a href="#!"><i class="feather icon-edit text-muted"></i></a>
                    </div>
                    <hr class="p-0 m-0">

                    <?php endforeach; ?>
                    <div>
                        <div class="text-right  m-r-20">
                            <a href="?c=listcm" class="b-b-primary text-primary d-flex-center">Xem tất cả</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $nguoidungs = Database::db_get_list("select * from user order by idnd desc limit 10");
    ?>
    <!-- Pie Chart -->
    <div class="col-xl-5 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Người dùng mới</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr style="text-align:center;background:#4e73df">
                                    <th>Tên</th>
                                    <th>Ảnh</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stt = 1;
                                if (!empty($nguoidungs))
                                    foreach ($nguoidungs as $nguoidung) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <div class="d-inline-block">
                                                <h6><?php echo $nguoidung['hoten']; ?></h6>
                                                <p class="text-muted m-b-0"></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><img src="../uploads/<?php echo $nguoidung['anhnd']; ?>"
                                            style="object-fit: cover;width:80%;height:60px;" class="img-thumbnail"
                                            alt="user image"></td>
                                    <td><?php echo $nguoidung['email']; ?></td>
                                </tr>
                                <?php $stt++;
                                    } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="text-right  m-r-20">
                        <a href="?c=listtv" class="b-b-primary text-primary d-flex-center">Xem tất cả</a>
                    </div>
                </div>
            </div>
        </div>
    </div>