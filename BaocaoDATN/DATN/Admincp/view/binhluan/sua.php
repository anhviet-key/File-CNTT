
<?php

$idsub = intval(Helper::input_value("id"));
if(!empty($idsub))
{
   $sql = "select * from categorysub where idsub = :idsub";
   $params = ["idsub"=>$idsub];
   $danhmucsub = Database::db_get_row($sql,$params); 
}
if (Helper::is_submit("edit_pro")) {
    $imgfile = "";
    $inputfile = "anhnd";
    if (Helper::upload_file($inputfile, $imgfile))
        $anhnd =  $imgfile;
    $tensub =  Helper::input_value("tensub");
    $mota =  Helper::input_value("mota");
    $iddm =  Helper::input_value("iddm");
    $sql = "update categorysub set iddm=:iddm,tensub=:tensub,mota=:mota,anhnd=:anhnd where idsub=:idsub";
    $params = [
        "idsub"=>$idsub,
        "iddm" => $iddm,
        "tensub" => $tensub,
        "mota" => $mota,
        "anhnd" => $anhnd
    ];

    if (Database::db_execute($sql, $params)) {
        Helper::redirect("$");
    }
}
?>

<div id="wrapper">
<div id="content">
 <div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 w-20">
        <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin khóa học </h6>
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
            <div class="text-primary col-sm-12 mt-5"><!--offset-sm-2-->
                <form  action="" method="post" id="add_form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="edit_pro">
                    <!-- <div>
                        <label for="">Ảnh bìa</label>
                        <div>
                        <img src="../uploads/7172c2.jpg" alt="" style="object-fit: cover;width:120px; height:120px; align-self: center">
                        </div>
                    </div> -->Ảnh bìa
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="anhnd" id="anhnd" required>
                        <label class="custom-file-label" for="anhnd"><?php echo $danhmucsub['anhnd']?></label>
                    </div>
                    
                    <div class="form-group text-left">
                        <label for="tensub">Tên khóa học:</label>
                        <input type="text" class="form-control"  style="color: #f6c23e;"  required
                         name="tensub" id="tensub" placeholder="Nhập họ tên khóa học" value="<?php echo $danhmucsub['tensub']?>">
                    </div>
                    <label for="sel1">Chuyên đề:</label>
                        <div class="form-group text-left input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Chuyên đề</label>
                      </div>
                        <select class="form-control" name="iddm" style="color: #f6c23e;" required>
                            <?php
                            $sql = "select * from category";
                            $danhmucs = Database::db_get_list($sql);
                            if (!empty($danhmucs))
                                foreach ($danhmucs as $ds) :
                            ?>
                                <option value="<?php echo $ds['iddm']; ?>">
                                    <?php echo $ds['tendm']; ?>
                                </option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group text-left">
                        <label for="mota">Giới thiệu:</label>
                        <textarea class="form-control summernote" rows="5" name="mota" id="mota" required><?php echo $danhmucsub['mota']?></textarea>
                    </div>
                    <div class="d-flex-center mb-6">
                    <input type="submit" class="btn btn-primary mt-3 w-20" value="Cập nhật">
                    </div>        
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
                    Danh sách tên khóa học
                </div>
                <!-- <div class="card-body"> -->
                <table class="table table-inverse">
                    <thead>
                        <tr class="cent">
                            <th>Tên khóa học</th>
                            <th>Ảnh</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $danhmucsub = Database::db_get_list("select * from categorysub order by idsub desc limit 10");
                    ?>
                    <?php
                        $idsub = 1;
                        if (!empty($danhmucsub))
                            foreach ($danhmucsub as $dsub) :
                        ?>
                            <tr>
                                <td><?php echo $dsub['tensub']; ?></td>
                                <td><img src="../uploads/<?php echo $dsub['anhnd']; ?>" style="object-fit: cover;width:100%;height:80px;" class="img-thumbnail"></td>
                            </tr>
                        <?php
                                $idsub++;
                            endforeach;
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
            </div>
        </div>