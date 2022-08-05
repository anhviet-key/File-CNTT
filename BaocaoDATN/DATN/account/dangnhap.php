<?php
include_once('../model/helper.php');
$db = new Database();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../public/user/assets/css/lglo.css">
    <link rel="icon" href="../public/user/assets/img/iOTEAM-rel-icon.png">
</head>

<body style="overflow: hidden;">
    <?php
  if (Helper::is_submit("dangnhap")) {
    $sql = "insert into user(hoten,email,matkhau) values(:hoten,:email,:matkhau)";
    $hoten = Helper::input_value("hoten");
    $email = Helper::input_value('email');
    $matkhau = md5(Helper::input_value('matkhau'));
    if (!empty($email) && !empty($matkhau)) {
      $sql = "select * from user where email=:email";
      $params = ["email" => $email];
      $user = Database::db_get_row($sql, $params);
      if (empty($user))
        echo $error['email'] = '<script>
         swal({
             title: "Xin lỗi!",
             text: "Email hoặc mật khẩu không đúng!!!",
             icon: "warning",
             button: "Trở lại",
           });</script>';
      else {
        if ($user['matkhau'] != $matkhau) {

          echo $error['matkhau'] = '<script>
                swal({
                    title: "Xin lỗi!",
                    text: "Email hoặc mật khẩu không đúng!!!",
                    icon: "warning",
                    button: "Trở lại",
                  });</script>';
        }
      }
      if (empty($error) && $user['kieunguoidung'] != 1) {
        $_SESSION['user'] = $user;
        $_SESSION['hoten'] = $hoten;
        Role::set_logged($user['email'], $user['kieunguoidung'], $user['hoten']);
        Helper::redirect(Helper::get_url('learn?c=manage'));
      }
    }
  }
  ?>
    <img class="wave" src="../public/user/assets/img/wave.png">
    <div class="container">
        <div class="img">
            <img src="../public/user/assets/img/bg.svg">
        </div>
        <div class="login-content">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <img src="../public/user/assets/img/avatar.svg">
                <h3 class="title m-3">Đăng nhập vào iOTeam</h3>
                <!-- <button type="button" aria-hidden="true">&times;</button> -->
                <div class="input-div one">
                    <div class="i">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" class="input" name="email" id="email" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Mật khẩu</h5>
                        <input type="password" class="input" name="matkhau" id="matkhau" required>
                    </div>
                </div>
                <a>Bạn đã có tài khoản chưa? <a href="dangky">Đăng ký</a></a>
                <input type="hidden" name="action" value="dangnhap">
                <input type="submit" class="btn" name="btnDangNhap" id="btnDangNhap" value="Đăng nhập">
                <a href="#" style="text-align: center;">Quên mật khẩu?</a>
            </form>
        </div>
    </div>

    <script>
    const inputs = document.querySelectorAll(".input");

    function addcl() {
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }

    function remcl() {
        let parent = this.parentNode.parentNode;
        if (this.value == "") {
            parent.classList.remove("focus");
        }
    }
    inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    });
    </script>
</body>

</html>