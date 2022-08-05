
</style>
<?php
   $idtt = intval(Helper::input_value("id"));
   if(!empty($idtt))
   {
      $sql = "select * from tintuc where idtt = :idtt";
      $params = ["idtt"=>$idtt];
      $tintucs = Database::db_get_row($sql,$params); 
   }
   
   $sql = "delete from tintuc where idtt = :idtt";
   $params = ["idtt"=>$idtt];
   if(Helper::is_submit("yes") && Database::db_execute($sql,$params))
   {
       Helper::redirect("./?c=listtt");
   }
   
?>

<h1 style='color:red;'>Cảnh báo!!!</h1>
<h1>Bạn có muốn xóa bài viết <?php echo "\" " . $tintucs["tieude"] . " \""; ?> này không ?</h1>
<form action="" method="post">
    <input type="hidden" name="action" value="yes">
    <input type="submit" value="Có" title="Có để tiếp tục" class="btn btn-danger col-sm-1">
    <a href="<?php echo Helper::get_url("Admincp/?c=listtt"); ?>" title="Không để trở lại" class="btn btn-success col-sm-1">Không</a>
    <br>
    <p class="mt-5"><a href="?c=listtt">Trở lại</a></p>
</form>
