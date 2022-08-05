<?php
$sql = "select * from videos order by idvd desc limit 10";
$video = Database::db_get_list($sql);
?>
<?php
if (Helper::is_submit("add_gg")) {

    $tenvd =  Helper::input_value("tenvd");
    $video_url = Helper::input_value("video_url");
    $idvd =  Helper::input_value("idvd");
    $idsub =  Helper::input_value("idsub");
    $sql = "insert into videos(idsub,tenvd,video_url) 
                 values(:idsub,:tenvd,:video_url)";
    $params = [
        "idsub"=>$idsub,
        "tenvd" => $tenvd,
        "video_url"=>$video_url
    ];

    if (Database::db_execute($sql, $params)) {
        Helper::redirect("#");
    }
}
?>

<div id="wrapper">
<div id="content">
 <div class="container-fluid">
  <div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Thêm video</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Lựa chọn:</div>
                    <a class="dropdown-item" href="#">Sửa</a>
                    <a class="dropdown-item" href="#">Xóa</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
            <div class="text-primary col-sm-12 mt-5 mb-5"><!--offset-sm-2-->
                <form  action="" method="post" id="add_form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add_gg">
                    <div class="form-group text-left">
                        <label for="tenvd">Tiêu đề video:</label>
                        <input type="text" class="form-control" name="tenvd" id="tenvd" placeholder="Nhập tiêu đề..." required>
                    </div>
                    <div class="form-group text-left input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Khóa học</label>
                      </div>
                        <select class="form-control" name="idsub" required>
                            <option value="">Choose...</option>
                            <?php
                            $sql = "select * from categorysub order by idsub desc";
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
                        </select>
                    </div>

                    <label for="basic-url">Nhập URL</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3" for="video_url"
                      >https://youtube.com/embed?v=/</span>
                  </div>
                  <input class="form-control"
                    type="video_url" name="video_url" id="video_url" placeholder="Nhập URL..." aria-describedby="basic-addon3" required/>
                </div>
                <div class="d-flex-center">
                    <input type="submit" class="btn btn-primary mt-3 w-20" value="Thêm vào">
                </div>
                </form>
            </div>
        </div>
        <p class="btn btn-secondary btn-icon-split">
            <span class="text-white-50">
             <i class="fas fa-angle-double-left"></i>
            </span>
            <span class="text" onclick="history.back(-1)">Quay lại</span>
        </p>
    </div>
    <div class="col-lg-6">
    <div class="card mb-5">
    <div class="card-header">
        Danh sách videos
    </div>
    <!-- <div class="card-body"> -->
    <table class="table table-inverse">
        <thead>
            <tr class="cent">
                <th>Tên Video</th>
                <th>URL video...</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $idvd = 1;
            if (!empty($video))
                foreach ($video as $sp) :
            ?>
                <tr>
                    <td><?php echo $sp['tenvd']; ?></td>
                    <td style="color:#1cc88a"><?php echo $sp['video_url']; ?></td>
                </tr>
            <?php
                    $idvd++;
                endforeach;
            ?>
        </tbody>
    </table>
    </div>
  </div>
 </div>
 </div>
 </div>




