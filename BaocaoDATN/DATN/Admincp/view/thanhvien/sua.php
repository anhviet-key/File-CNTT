
<?php
$idnd = intval(Helper::input_value("id"));
if(!empty($idnd))
{
   $sql = "select * from user where idnd = :idnd";
   $params = ["idnd"=>$idnd];
   $nguoidungs = Database::db_get_row($sql,$params); 
}
if (Helper::is_submit("edit_tv")) {
    $imgfile = "";
    $inputfile = "anhnd";
    if (Helper::upload_file($inputfile, $imgfile))
        $anhnd =  $imgfile;
    $email =  Helper::input_value("email");
    $matkhau =  md5(Helper::input_value("matkhau"));
    $hoten =  Helper::input_value("hoten");
    $kieunguoidung =  Helper::input_value("kieunguoidung");
    $trangthai =  Helper::input_value("trangthai");
    $sql = "update user set email=:email,matkhau=:matkhau,hoten=:hoten,kieunguoidung=:kieunguoidung,trangthai=:trangthai,anhnd=:anhnd where idnd = :idnd";
    $params = [
        "email" => $email,
        "matkhau" => $matkhau,
        "hoten" => $hoten,
        "kieunguoidung" => $kieunguoidung,
        "trangthai" => $trangthai,
        "idnd" => $idnd,
        "anhnd"=> $anhnd
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
            <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin người dùng</h6>
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
            <div class="text-primary col-sm-12">
                <form  action="" method="post" id="add_form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="edit_tv">
                    <div class="custom-file mt-5">
                        <input type="file" class="custom-file-input" name="anhnd" id="anhnd" required>
                        <label class="custom-file-label" for="anhnd">Chọn hình đại diện</label>
                    </div>
                    <label for="email">Email:</label>
                    <div class="input-group-prepend">
                        <input type="email" style="color: #f6c23e;" class="form-control" required
                         name="email" id="email" value="<?php echo $nguoidungs["email"]; ?>">
                         <span class="input-group-text" id="basic-addon1">@gmail.com</span>
                    </div>
                    <div class="form-group text-left">
                        <label for="matkhau">Mật khẩu:</label>
                        <input type="password" style="color: #f6c23e;" class="form-control" required
                         name="matkhau" id="matkhau" value="<?php echo $nguoidungs["matkhau"]; ?>">
                    </div>   
                    <div class="form-group text-left">
                        <label for="hoten">Họ tên:</label>
                        <input type="text" style="color: #f6c23e;" class="form-control" required
                         name="hoten" id="hoten" value="<?php echo $nguoidungs["hoten"]; ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="kieunguoidung">Kiểu người dùng:</label>
                        <input type="text" style="color: #f6c23e;" class="form-control" name="kieunguoidung" required
                         placeholder="1(Admin) or 2(User)" id="kieunguoidung" value="<?php echo $nguoidungs["kieunguoidung"]; ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="trangthai">Trạng thái:</label>
                        <input type="text" style="color: #f6c23e;" class="form-control" name="trangthai" required
                         placeholder="0(Không có quyền) or 1(có quyền)" id="trangthai" value="<?php echo $nguoidungs["trangthai"]; ?>">
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Sửa Thành Viên">
                    <br>
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
                    Danh sách người dùng
                </div>
                <!-- <div class="card-body"> -->
                <table class="table table-inverse">
                    <thead>
                        <tr class="cent">
                            <th>Tên người dùng</th>
                            <th>Ngày thêm</th>
                            <th>Ngày cập nhật</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nguoidungss = Database::db_get_list("select * from user order by idnd desc limit 10");
                        ?>
                    <?php
                        $idnd = 1;
                        if (!empty($nguoidungss))
                            foreach ($nguoidungss as $nd) :
                        ?>
                            <tr>
                                <td><?php echo $nd['hoten']; ?></td>
                                <td><?php echo $nd['ngaytaonguoidung']; ?></td>
                                <td style="color:#1cc88a"><?php echo $nd['ngaycapnhatnguoidung'];?></td>
                            </tr>
                        <?php
                                $idnd++;
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