<?php
   if(!Role::is_admin()){
      Helper::redirect(Helper::get_url('Admincp/?v=common&a=logout'));
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name=description content="">
   <meta name=viewport content="width=device-width, initial-scale=1">
   
   <title>Trang Quản Trị Hệ Thống</title>
</head>

<body id="page-top">
   <div id="wrapper">
      <?php include_once('layout/slidebar.php') ?>
      <div id="content-wrapper" class="flex-column">
         <div id="content">
            <?php include_once('layout/header.php') ?>
            <?php include_once('layout/main.php') ?>
         </div>
      </div>
</div>
   

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Đăng Xuất</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">Bạn có muốn đăng xuất hay không ?</div>
            <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
               <a class="btn btn-primary" href="<?php echo Helper::get_url('Admincp/?v=common&a=logout'); ?>">Đăng Xuất</a>
            </div>
         </div>
      </div>
   </div>

</body>

</html>