
</style>
<?php
   $idsp = intval(Helper::input_value("id"));
   if(!empty($idsp))
   {
      $sql = "select * from Sanpham where idsp = :idsp";
      $params = ["idsp"=>$idsp];
      $Sanphams = Database::db_get_row($sql,$params); 
   }
   
   $sql = "delete from Sanpham where idsp = :idsp";
   $params = ["idsp"=>$idsp];
   if(Helper::is_submit("yes") && Database::db_execute($sql,$params))
   {
       Helper::redirect("./?c=listpro");
   }
   
?>

<h1 style='color:red;'>Cảnh báo!!!</h1>
<h1>Bạn có muốn xóa sản phẩm <?php echo "\" " . $Sanphams["tensp"] . " \""; ?> này không ?</h1>
<form action="" method="post">
    <input type="hidden" name="action" value="yes">
    <input type="submit" value="Có" title="Có để tiếp tục" class="btn btn-danger col-sm-1">
    <a href="<?php echo Helper::get_url("Admincp/?c=listpro"); ?>" title="Không để trở lại" class="btn btn-success col-sm-1">Không</a>
    <br>
    <p class="mt-5"><a href="?c=listpro">Trở lại sản phẩm</a></p>
</form>
