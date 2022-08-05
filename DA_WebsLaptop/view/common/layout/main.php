<?php
  $content = Helper::input_value('c');
  if(!empty($content))
  {
     switch($content)
     {
         case "tintuc":
            include_once("main/tintuc.php");
            break;
         case "lienhe":
            include_once("main/lienhe.php");
            break;
         case "sanpham":
            include_once("main/sanpham.php");
            break;  
         case "giohang":
            include_once("main/giohang.php");
            break;
         case "dangky":
            include_once("main/dangky&dangnhap.php");
            break;
         case "chitiettintuc":
            include_once("main/chitiettinttuc.php");
            break;  
         case "chitietsp":
            include_once("main/chitietsp.php");
            break;
         case "chitietspgg":
            include_once("main/chitietspgg.php");
            break;
         case "list":
            include_once("main/listpro.php");
            break;
         case "TK":
            include_once("main/TK.php");
            break;
         case "TKiem":
            include_once("main/timkiem.php");
            break;
         case "logout":
            include_once("main/logout.php");
            break;
     }
  }
  else
      include_once("main/contain.php");
?>