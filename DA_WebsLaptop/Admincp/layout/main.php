
<!-- Begin Page Content -->
<div class="container-fluid">

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
   <div class="row Cbao">
      <div class="col-lg-12">
         <!-- <h3>Nội Dung Hiển Thị</h3> -->
<?php
  $content = Helper::input_value('c');
  if(!empty($content))
  {
     switch($content)
     {
         case "addcat":
            include_once("view/Quanlydanhmuc/Them.php");
            break;
         case "editcat":
            include_once("view/Quanlydanhmuc/Sua.php");
            break;
         case "deletecat":
            include_once("view/Quanlydanhmuc/Xoa.php");
            break;  
         case "listcat":
            include_once("view/Quanlydanhmuc/list.php");
            break;


         case "addpro":
            include_once("view/Quanlysanpham/Them.php");
            break;   
         case "editpro":
            include_once("view/Quanlysanpham/Sua.php");
            break;    
         case "deletepro":
            include_once("view/Quanlysanpham/Xoa.php");
            break;  
         case "listpro":
            include_once("view/Quanlysanpham/list.php");
            break;

         case "addgg":
            include_once("view/Quanlygiamgia/Them.php");
            break;   
         case "editgg":
            include_once("view/Quanlygiamgia/Sua.php");
            break;    
         case "deletegg":
            include_once("view/Quanlygiamgia/Xoa.php");
            break;  
         case "listgg":
            include_once("view/Quanlygiamgia/list.php");
            break;

         case "addtt":
            include_once("view/Quanlybaiviet/Them.php");
            break;   
         case "edittt":
            include_once("view/Quanlybaiviet/Sua.php");
            break;    
         case "deletett":
            include_once("view/Quanlybaiviet/Xoa.php");
            break;  
         case "listtt":
            include_once("view/Quanlybaiviet/list.php");
            break;

         case "addtv":
            include_once("view/thanhvien/them.php");
            break;   
         case "edittv":
            include_once("view/thanhvien/sua.php");
            break;    
         case "deletetv":
            include_once("view/thanhvien/xoa.php");
            break;  
         case "listtv":
            include_once("view/thanhvien/list.php");
            break;
     }
  }
  else
      include_once("view/common/dashboard.php");
?>

      </div>
   </div>

</div>
</div>
