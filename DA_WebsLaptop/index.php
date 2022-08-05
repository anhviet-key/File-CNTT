<?php
include_once('model/helper.php');
$db = new Database();
?>

   <!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <link rel="shortcut icon" href="public/user/assets/img/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="public/user/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font-Awesome CSS -->
    <link href="public/user/assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- helper class css -->
    <link href="public/user/assets/css/helper.min.css" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="public/user/assets/css/plugins.css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="public/user/assets/css/style.css" rel="stylesheet">
    <link href="public/user/assets/css/skin-default.css" rel="stylesheet" id="galio-skin">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
   $view = filter_input(INPUT_GET,"v");
   $action = filter_input(INPUT_GET,"a");
   if(empty($view) || empty($action))
   {
       $view = 'common';
       $action = 'home';
   }

   $path = 'view/' . $view . '/' . $action . '.php';
   if(file_exists($path))
   {
      include_once($path);
   }
   else
   {
      header('Location:404.php');
   }
?>
    <script src="public/user/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- Jquery Min Js -->
    <script src="public/user/assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Popper Min Js -->
    <script src="public/user/assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap Min Js -->
    <script src="public/user/assets/js/vendor/bootstrap.min.js"></script>
    <!-- Plugins Js-->
    <script src="public/user/assets/js/plugins.js"></script>
    <!-- Ajax Mail Js -->
    <script src="public/user/assets/js/ajax-mail.js"></script>
    <!-- Active Js -->
    <script src="public/user/assets/js/main.js"></script>
    <script src="public/user/assets/js/switcher.js"></script>

    </html>
