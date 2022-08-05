<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Trang Chủ</title>
    <style>
        /* Login User Modal HTML */
        #loginuser {
            font-family: 'Varela Round', sans-serif;
        }

        #loginuser .modal-login {
            color: #636363;
            width: 450px;
        }

        #loginuser .modal-login .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }

        #loginuser .modal-login .modal-header {
            border-bottom: none;
            position: relative;
            justify-content: center;
        }

        #loginuser .modal-login h4 {
            text-align: center;
            font-size: 26px;
        }

        #loginuser .modal-login .form-group {
            position: relative;
        }

        #loginuser .modal-login i {
            position: absolute;
            left: 13px;
            top: 11px;
            font-size: 18px;
        }

        #loginuser .modal-login .form-control {
            padding-left: 40px;
        }

        #loginuser .modal-login .form-control:focus {
            border-color: #7B68EE;
        }

        #loginuser .modal-login .form-control,
        #loginuser .modal-login .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        #loginuser .modal-login .hint-text {
            text-align: center;
            padding-top: 10px;
        }

        #loginuser .modal-login .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }

        #loginuser .modal-login .btn,
        #loginuser .modal-login .btn:active {
            border: none;
            background: #7B68EE !important;
            line-height: normal;
        }

        #loginuser .modal-login .btn:hover,
        #loginuser .modal-login .btn:focus {
            background: #7B68EE !important;
        }

        #loginuser .modal-login .modal-footer {
            background: #ecf0f1;
            border-color: #dee4e7;
            text-align: center;
            margin: 0 -20px -20px;
            border-radius: 5px;
            font-size: 13px;
            justify-content: center;
        }

        #loginuser .modal-login .modal-footer a {
            color: #999;
        }

        #loginuser .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }

        /* Regiter User Modal HTML */
        #register {
            font-family: 'Varela Round', sans-serif;
        }

        #register .modal-login {
            color: #636363;
            width: 450px;
        }

        #register .modal-login .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }

        #register .modal-login .modal-header {
            border-bottom: none;
            position: relative;
            justify-content: center;
        }

        #register .modal-login h4 {
            text-align: center;
            font-size: 26px;
        }

        #register .modal-login .form-group {
            position: relative;
        }

        #register .modal-login i {
            position: absolute;
            left: 13px;
            top: 11px;
            font-size: 18px;
        }

        #register .modal-login .form-control {
            padding-left: 40px;
        }

        #register .modal-login .form-control:focus {
            border-color: #7B68EE;
        }

        #register .modal-login .form-control,
        #register .modal-login .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        #register .modal-login .hint-text {
            text-align: center;
            padding-top: 10px;
        }

        #register .modal-login .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }

        #register .modal-login .btn,
        #register .modal-login .btn:active {
            border: none;
            background: #7B68EE !important;
            line-height: normal;
        }

        #register .modal-login .btn:hover,
        #register .modal-login .btn:focus {
            background: #7B68EE !important;
        }

        #register .modal-login .modal-footer {
            background: #ecf0f1;
            border-color: #dee4e7;
            text-align: center;
            margin: 0 -20px -20px;
            border-radius: 5px;
            font-size: 13px;
            justify-content: center;
        }

        #register .modal-login .modal-footer a {
            color: #999;
        }

        #register .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }

        input#chapnhan {
            margin-top: 3px;
            margin-left: -152px;
            height: 15px;
        }
    </style>
</head>
<?php
    if(Helper::is_submit("dangnhap")){
       $email = Helper::input_value('email');
       $matkhau = md5(Helper::input_value('matkhau'));
       if(!empty($email) && !empty($matkhau))
       {
          $sql = "select * from nguoidung where email=:email"; 
          $params = ["email"=>$email];
          $user = Database::db_get_row($sql,$params);
          if(isset($email)){
            setcookie('email',$email,time()+3600,'/','',0,0);
            setcookie('matkhau',(Helper::input_value('matkhau')),time()+3600,'/','',0,0);
          }
        if(empty($user))
       
         echo $error['email'] = '<script>
         swal({
             title: "Xin lỗi!",
             text: "Email hoặc mật khẩu không đúng!!!",
             icon: "warning",
             button: "Trở lại",
           });</script>';
       else
          {
            if($user['matkhau'] != $matkhau)
            {
                echo $error['matkhau'] = '<script>
                swal({
                    title: "Xin lỗi!",
                    text: "Email hoặc mật khẩu không đúng!!!",
                    icon: "warning",
                    button: "Trở lại",
                  });</script>';
            }
          }
       if(empty($error) && $user['kieunguoidung'] != 1)
          {
              $_SESSION['email'] = $email;
              header('location: TK.php');
              Role::set_logged($user['email'],$user['kieunguoidung'],$user['hoten']);
              Helper::redirect(Helper::get_url('?c=TK'));
          }
       }
    }
    ?>
    <!-- Login User Modal HTML -->
    <div id="loginuser" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Đăng Nhập</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div>
                    <img src="" alt="">
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required" value="<?php if (isset($_COOKIE['email'])) echo $_COOKIE['email']?>">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control" name="matkhau" id="matkhau" placeholder="Mật khẩu" required="required"  value="<?php if (isset($_COOKIE['matkhau'])) echo $_COOKIE['matkhau']?>">
                        </div>
                        <input type="hidden" name="action" value="dangnhap">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block btn-lg" name="btnDangNhap" id="btnDangNhap" value="Đăng nhập">
                        </div>
                    </form>
                </div>
                <label><input type="checkbox" value="<?php echo $_COOKIE['email']  ?>" <?php echo isset($_COOKIE['matkhau'])?'checked':''; ?>> Nhớ mật khẩu</label>
                <div class="modal-footer">
                    <a href="#">Quên mật khẩu</a>
                </div>
                  
            </div>
            </div>
        </div>
    </div>
    <!-- End Login User Modal HTML -->

    <?php
       if(Helper::is_submit("dangky")){
        $sql = "insert into nguoidung(hoten,email,matkhau) values(:hoten,:email,:matkhau)";
        $hoten = Helper::input_value("hoten");
        $email = Helper::input_value("email");
        $matkhau = md5(Helper::input_value("matkhau"));
        $params = [
            "hoten"=>$hoten,
            "email"=>$email,
            "matkhau"=>$matkhau
        ];
        if(Database::db_execute($sql,$params)){
            echo '<script>
            swal({
                title: "Chúc mừng!",
                text: "Bạn đã đăng ký thành công",
                icon: "success",
                button: "Trở lại",
              });</script>';
            $_SESSION['dangky'] = $hoten;
        }
        else{
            echo '<script>
            swal({
                title: "Xin lỗi!",
                text: "Đăng ký không thành công vì email đã có người sử dụng",
                icon: "warning",
                button: "Trở lại",
              });</script>';
        }
       }
    ?>

    <!-- Register Modal HTML -->
    <div id="register" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Đăng Ký</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" name="hoten" id="hoten" placeholder="Họ tên" required="required">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control" name="matkhau" id="matkhau" placeholder="Mật khẩu" required="required">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control" name="re-matkhau" id="re-matkhau" placeholder="Nhập lại mật khẩu" required="required">
                        </div>
                        <!-- <div class="form-group form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="chapnhan" id="chapnhan"> Tôi chấp nhận <a href="#">Điều khoản</a>
                            </label>
                        </div> -->
                        <input type="hidden" name="action" value="dangky">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block btn-lg" name="btnDangKy" id="btnDangKy" value="Đăng ký">
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <a href="#">Quên mật khẩu</a>
                    Bạn đã có tài khoản. <a href="#loginuser" data-toggle="modal">Đăng nhập ở đây !</a>
                </div> -->
            </div>
        </div>
    </div>
    <!-- End Register Modal HTML -->

</body>

</html>

