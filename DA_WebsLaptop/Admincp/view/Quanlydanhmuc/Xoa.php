<?php
   $iddm = intval(Helper::input_value("id"));
   if(!empty($iddm))
   {
      $sql = "select * from danhmuc where iddm = :iddm";
      $params = ["iddm"=>$iddm];
      $danhmucs = Database::db_get_row($sql,$params); 
   }
   
   $sql = "delete from danhmuc where iddm = :iddm";
   $params = ["iddm"=>$iddm];
   if(Helper::is_submit("yes") && Database::db_execute($sql,$params))
   {
       Helper::redirect("./?c=listcat");
   }
   
?>

<h1 style='color:red;'>Cảnh báo!!!</h1>
<h1>Bạn có muốn xóa danh mục <?php echo "\" " . $danhmucs["tendm"] . " \""; ?> này không ?</h1>
<form action="" method="post">
    <input type="hidden" name="action" value="yes">
    <input type="submit" value="Có" title="Có để tiếp tục" class="btn btn-danger col-sm-1">
    <a href="<?php echo Helper::get_url("Admincp/?c=listcat"); ?>" title="Không để trở lại" class="btn btn-success col-sm-1">Không</a>
    <br>
    <p class="mt-5"><a href="?c=listcat">Trở lại danh mục</a></p>
</form>
