<?php
include_once('../model/helper.php');
$db = new Database();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
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
       if(Helper::is_submit("dangky")){
        $sql = "insert into user(hoten,email,matkhau) values(:hoten,:email,:matkhau)";
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
            // $_SESSION['dangky'] = $hoten;
			// Helper::redirect(Helper::get_url('#'));
        }
        else {
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
	<img class="wave" src="../public/user/assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="../public/user/assets/img/bg.svg">
		</div>
		<div class="login-content">
			<form method="post">
				<img src="../public/user/assets/img/avatar.svg">
				<h3 class="title m-3">Đăng ký vào iOTeam</h3>
				<div class="input-div one">
					<div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
					<div class="div">
           		   		<h5>Tên người dùng</h5>
           		   		<input type="text" name="hoten" id="hoten" class="input" required>
           		   </div>
           		</div>
           		<div class="input-div one">
				   <div class="i">
						<i class="far fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" name="email" id="email" class="input" required>
           		   </div>
           		</div>
				   
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Mật khẩu</h5>
           		    	<input type="password" name="matkhau" id="matkhau" class="input" required>
            	   </div>
            	</div>
				<div class="input-div pass">
					<div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
				   <div class="div">
           		    	<h5>Nhập lại mật khẩu</h5>
           		    	<input type="password" name="re-matkhau" id="re-matkhau" class="input" required>
            	   </div>
				</div>
            	<a>Bạn đã có tài khoản chưa? <a href="dangnhap">Đăng nhập</a></a>
				<input type="hidden" name="action" value="dangky">
            	<input type="submit" class="btn" name="btnDangKy" id="btnDangKy" value="Đăng Ký">
              <a href="#" style="text-align: center;">Quên mật khẩu?</a>
            </form>
        </div>
    </div>
<script>
const inputs = document.querySelectorAll(".input");
function addcl(){
let parent = this.parentNode.parentNode;
parent.classList.add("focus");
}
function remcl(){
let parent = this.parentNode.parentNode;
if(this.value == ""){
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
