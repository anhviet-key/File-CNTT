
<?php

$idnd = intval(Helper::input_value("id"));
if(!empty($idnd))
{
   $sql = "select * from nguoidung where idnd = :idnd";
   $params = ["idnd"=>$idnd];
   $nguoidungs = Database::db_get_row($sql,$params); 
}
if (Helper::is_submit("edit_tv")) {

    $email =  Helper::input_value("email");
    $matkhau =  md5(Helper::input_value("matkhau"));
    $hoten =  Helper::input_value("hoten");
    $kieunguoidung =  Helper::input_value("kieunguoidung");
    $trangthai =  Helper::input_value("trangthai");
    $sql = "update nguoidung set email=:email,matkhau=:matkhau,hoten=:hoten,kieunguoidung=:kieunguoidung,trangthai=:trangthai where idnd = :idnd";
    $params = [
        "email" => $email,
        "matkhau" => $matkhau,
        "hoten" => $hoten,
        "kieunguoidung" => $kieunguoidung,
        "trangthai" => $trangthai,
        "idnd" => $idnd
    ];

    if (Database::db_execute($sql, $params)) {
        Helper::redirect("./?c=listtv");
    }
}
?>
    <div class="container">
        <div class="row">
            <div class="text-primary col-sm-12">
                <h1>Sửa Thông Tin</h1>
                <form  action="" method="post" id="add_form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="edit_tv">
                    <div class="form-group text-left">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" required="required" id="email" value="<?php echo $nguoidungs["email"]; ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="matkhau">Mật khẩu:</label>
                        <input type="password" class="form-control" name="matkhau" required="required" id="matkhau" value="<?php echo $nguoidungs["matkhau"]; ?>">
                    </div>   
                    <div class="form-group text-left">
                        <label for="hoten">Họ tên:</label>
                        <input type="text" class="form-control" name="hoten" id="hoten" value="<?php echo $nguoidungs["hoten"]; ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="kieunguoidung">Kiểu người dùng:</label>
                        <input type="text" class="form-control" name="kieunguoidung" placeholder="1(Admin) or 2(User)" id="kieunguoidung" value="<?php echo $nguoidungs["kieunguoidung"]; ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="trangthai">Trạng thái:</label>
                        <input type="text" class="form-control" name="trangthai" placeholder="0(Không có quyền) or 1(có quyền)" id="trangthai" value="<?php echo $nguoidungs["trangthai"]; ?>">
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Sửa Thành Viên">
                    <br>
                    <p class="mt-5"><a href="?c=listtv">Danh sách</a></p>
                </form>
            </div>
        </div>
    </div>