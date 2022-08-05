<?php
   $idgg = intval(Helper::input_value("id"));
   if(!empty($idgg))
   {
      $sql = "select * from giamgia where idgg = :idgg";
      $params = ["idgg"=>$idgg];
      $giamgias = Database::db_get_row($sql,$params); 
   }
   
   $sql = "delete from giamgia where idgg = :idgg";
   $params = ["idgg"=>$idgg];
   if(Helper::is_submit("yes") && Database::db_execute($sql,$params))
   {
       Helper::redirect("./?c=listgg");
   }
   
?>

<h1 style='color:red;'>Cảnh báo!!!</h1>
<h1>Bạn có muốn xóa sản phẩm <?php echo "\" " . $giamgias["tensp"] . " \""; ?> này không ?</h1>
<form action="" method="post">
    <input type="hidden" name="action" value="yes">
    <input type="submit" value="Có" title="Có để tiếp tục" class="btn btn-danger col-sm-1">
    <a href="<?php echo Helper::get_url("Admincp/?c=listgg"); ?>" title="Không để trở lại" class="btn btn-success col-sm-1">Không</a>
</form>
