<?php
  $content = Helper::input_value('c');
  if(!empty($content))
  {
     switch($content)
     {
         case "baiviet":
            include_once("main/baiviet.php");
            break;
         case "taitro":
            include_once("main/taitro.php");
            break;
         case "gioithieu":
            include_once("main/gioithieu.php");
            break;
         case "lienhe":
            include_once("main/lienhe.php");
            break;
         case "khoahoc":
            include_once("main/khoahoc.php");
            break;
         case "chitietkhoahoc":
            include_once("main/chitietkhoahoc.php");
            break;
         case "chitietbaiviet":
            include_once("main/chitietbaiviet.php");
            break;  
         case "TK":
            include_once("main/TK.php");
            break;
         case "TKiem":
            include_once("main/timkiem.php");
            break;
         case "listvideo":
            include_once("main/listvideo.php");
            break;
         case "manage":
            include_once("main/manage.php");
            break;
         case "list":
            include_once("main/listpro.php");
            break;
         case "gioithieukhoahoc":
            include_once("main/gioithieukhoahoc.php");
            break;
         case "timkiembaiviet":
            include_once("main/timkiembaiviet.php");
            break;
     }
  }
  else
      include_once("main/khoahoc.php");