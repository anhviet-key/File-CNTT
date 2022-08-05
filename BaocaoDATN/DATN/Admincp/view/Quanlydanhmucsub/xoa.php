<?php
   $idsub = intval(Helper::input_value("id"));
   if(!empty($idsub))
   {
      $sql = "select * from categorysub where idsub = :idsub";
      $params = ["idsub"=>$idsub];
      $danhmucsub = Database::db_get_row($sql,$params); 
   }
   
   $sql = "delete from categorysub where idsub = :idsub";
   $params = ["idsub"=>$idsub];
   if(Helper::is_submit("yes") && Database::db_execute($sql,$params))
   {
       Helper::redirect("./?c=listpro");
   }
   
?>
<style>
    footer {display: none;}
</style>
<div style="text-align:center">
<h1 style='color:red;'>Cảnh báo!!!</h1>
<h1>Bạn có muốn xóa danh mục <?php echo "\" " . $danhmucsub["tensub"] . " \""; ?> này không ?</h1>
<form action="" method="post">
    <input type="hidden" name="action" value="yes">
    <input type="submit" value="Có" title="Có để tiếp tục" class="btn btn-danger col-sm-1">
    <a title="Không để trở lại" class="btn btn-success col-sm-1" onclick="history.back(-1)">Không</a>
</form>
</div>
