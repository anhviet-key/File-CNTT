
<?php
if (Helper::is_submit("add_tv")) {
    
    $email =  Helper::input_value("email");
    $matkhau =  md5(Helper::input_value("matkhau"));
    $hoten =  Helper::input_value("hoten");
    $kieunguoidung =  Helper::input_value("kieunguoidung");
    $sql = "insert into nguoidung(email,matkhau,hoten,kieunguoidung) 
                 values(:email,:matkhau,:hoten,:kieunguoidung)";
    $params = [
        "email" => $email,
        "matkhau" => $matkhau,
        "hoten" => $hoten,
        "kieunguoidung"=>$kieunguoidung
    ];

    if (Database::db_execute($sql, $params)) {
        Helper::redirect("./?c=listtv");
    }
}
?>

    <div class="container">
        <div class="row Cbao">
            <div class="text-primary col-sm-7"><!--offset-sm-2-->
                <h1>Thêm Thành Viên</h1>
                <form  action="" method="post" id="add_form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add_tv">
                    <div class="form-group text-left">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Nhập Email" required="required">
                    </div>
                    <div class="form-group text-left">
                        <label for="matkhau">Mật khẩu:</label>
                        <input type="password" class="form-control" name="matkhau" id="matkhau" placeholder="Nhập mật khẩu" required="required">
                    </div>
                    
                    <div class="form-group text-left">
                        <label for="hoten">Họ tên:</label>
                        <input type="text" class="form-control" name="hoten" id="hoten" placeholder="Nhập họ tên">
                    </div>
                    <div class="form-group text-left">
                        <label for="kieunguoidung">Kiểu người dùng:</label>
                        <input type="text" class="form-control" name="kieunguoidung" id="kieunguoidung" placeholder="1(Admin) or 2(User)">
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Thêm Thành Viên">
                    <br>
                    <p class="mt-1"><a href="?c=listtv">Danh sách</a></p>
                </form>
            </div>
        </div>
    </div>
