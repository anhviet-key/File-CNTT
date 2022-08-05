<?php 
if(Role::is_admin())
Helper::redirect(Helper::get_url('Admincp/?v=common&a=admin'));

if(Helper::is_submit('login'))
{
    $email = Helper::input_value('email');
    $matkhau = md5(Helper::input_value('matkhau'));
    $sql = "select * from nguoidung where email=:email and matkhau=:matkhau"; 
       $params = ["email"=>$email,"matkhau"=>$matkhau];
       $user = Database::db_get_row($sql,$params);
    
    if(!empty($email) && !empty($matkhau))
    {
       if(empty($user))
       {
       }
       else if($user['kieunguoidung'] == 1)
       {
            $_SESSION['email'] = $email;
            header('location: TK.php');
           Role::set_logged($user['email'],$user['kieunguoidung'],$user['hoten']);
           Helper::redirect(Helper::get_url('Admincp/?v=common&a=admin'));
       }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng Nhập Hệ Thống</title>

    <!-- Use CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body {
            background-image: url("https://inlonggia.com/wp-content/uploads/Background-dep-vector.jpg");
            background-size: cover;
            height: 90%;
        }
        .login-form {
            width: 400px;
            margin: 30px auto;
            position: relative;
            top: 180px;
        }

        .login-form form {
            margin-bottom: 15px;
            /* box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3); */
            padding: 30px;
            color: white;
        }
        
        .login-form h2 {
            /* margin: 0 0 15px; */
            float: left;
            font-size:40px;
            border-bottom: 6px solid #4caf50;
            margin-bottom:50px;
            padding: 13px 0;
        }

        /* .form-control,
        .login-btn {
            border-radius: 2px;
        } */

        .textbox{
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding:8px 0;
            margin: 8px 0;
            border-bottom: 1px solid #4caf50;
        }
        /* .textbox i{
            width: 26px;
            float: left;
            text-align: center;
        } */
        .textbox input{
            border: none;
            outline: none;
            background: none;
            color:white;
            font-size: 18px;
            float: left;
            width: 80%;
            float: left;
            margin: 0 10px;
        }

        .input-group-prepend .fa {
            font-size: 18px;
        }

        .login-btn {
            width: 100%;
            background: none;
            border: 2px solid #4caf50;
            color: white;
            padding: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .social-btn .btn {
            border: none;
            margin: 10px 3px 0;
            opacity: 1;
        }

        .social-btn .btn:hover {
            opacity: 0.9;
        }

        .social-btn .btn-secondary,
        .social-btn .btn-secondary:active {
            background: #507cc0 !important;
        }

        .social-btn .btn-info,
        .social-btn .btn-info:active {
            background: #64ccf1 !important;
        }

        .social-btn .btn-danger,
        .social-btn .btn-danger:active {
            background: #df4930 !important;
        }

        .or-seperator {
            margin-top: 20px;
            text-align: center;
            border-top: 1px solid #ccc;
        }

        .or-seperator i {
            padding: 0 10px;
            background: #f7f7f7;
            position: relative;
            top: -11px;
            z-index: 1;
        }
        
    </style>
</head>

<body>
    <div class="login-form">
        <form action="" method="post">
            <h2 class="text-center">Hệ Thống</h2>
            <div class="form-group textbox">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <input type="email" name="email" id="email" placeholder="Email" required="required">
                </div>
            </div>
            <div class="form-group textbox">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <input type="password" name="matkhau" id="matkhau" placeholder="Mật khẩu"
                        required="required">
                </div>
            </div>
            <input type="hidden" name="action" value="login">
            <div class="form-group">
                <button type="submit" class="btn btn-success login-btn btn-block">Đăng Nhập</button>
            </div>
            
            <!-- <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Nhớ mật khẩu</label>
                <a href="#" class="float-right">Quên mật khẩu</a>
            </div> -->
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
</body>

</html>

