<?php
   $nguoidungs = Database::db_get_list("select * from user order by idnd desc limit 10");
?>
<?php
if (Helper::is_submit("add_tv")) {
    $imgfile = "";
    $inputfile = "anhnd";
    if (Helper::upload_file($inputfile, $imgfile))
        $anhnd =  $imgfile;
    $email =  Helper::input_value("email");
    $matkhau =  md5(Helper::input_value("matkhau"));
    $hoten =  Helper::input_value("hoten");
    $kieunguoidung =  Helper::input_value("kieunguoidung");
    $sql = "insert into user(email,matkhau,hoten,kieunguoidung,anhnd) 
                 values(:email,:matkhau,:hoten,:kieunguoidung,:anhnd)";
    $params = [
        "email" => $email,
        "matkhau" => $matkhau,
        "hoten" => $hoten,
        "kieunguoidung"=>$kieunguoidung,
        "anhnd" => $anhnd
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
            <h6 class="m-0 font-weight-bold text-primary">Thêm Thành Viên</h6>
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
            <div class="text-primary col-sm-12"><!--offset-sm-2-->
                <form  action="" method="post" id="add_form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add_tv">
                    <div class="custom-file mt-5">
                        <input type="file" class="custom-file-input" name="anhnd" id="anhnd" required>
                        <label class="custom-file-label" for="anhnd">Chọn hình đại diện</label>
                    </div>
                    <label for="email">Email:</label>
                    <div class="input-group-prepend">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Nhập Email" required>
                    <span class="input-group-text" id="basic-addon1">@gmail.com</span>
                    </div>
                    <div class="form-group text-left">
                        <label for="matkhau">Mật khẩu:</label>
                        <input type="password" class="form-control" name="matkhau" id="matkhau" placeholder="Nhập mật khẩu" required>
                    </div>
                    
                    <div class="form-group text-left">
                        <label for="hoten">Họ tên:</label>
                        <input type="text" class="form-control" name="hoten" id="hoten" placeholder="Nhập họ tên" required>
                    </div>
                    <div class="form-group text-left">
                        <label for="kieunguoidung">Kiểu người dùng:</label>
                        <input type="text" class="form-control" name="kieunguoidung" required
                         id="kieunguoidung" placeholder="1(Admin) or 2(User)">
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
        Danh sách thành viên
    </div>
    <div class="card-body">
    <table class="table table-inverse">
        <thead>
            <tr class="cent">
                <th>Tên</th>
                <th>Hình đại diện</th>
                <th>Kiểu người dùng</th>
                <th>Trạng thái</th>

            </tr>
        </thead>
        <tbody>
        <?php
            $idnd = 1;
            if (!empty($nguoidungs))
                foreach ($nguoidungs as $nd) :
            ?>
                <tr>
                    <td><?php echo $nd['hoten']; ?></td>
                    <td><img src="../uploads/<?php echo $nd['anhnd']; ?>" style="object-fit: cover;width:80%;height:80px;" class="img-thumbnail"></td>
                    <td><?php echo ($nd['kieunguoidung']==1)?'Admin':'User'; ?></td>
                    <td>
                        <div class="m-b-7 m-r-20 flex-c-m">
                            <input type="checkbox" name="chk_active" value="<?php echo $nd['trangthai'];  ?>" <?php echo ($nd['trangthai'] == 1)?'checked':''; ?> disabled style="zoom:1.5">
                        </div>
                        </td>
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
    
