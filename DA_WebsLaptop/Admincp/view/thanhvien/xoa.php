
<?php
   $idnd = intval(Helper::input_value("id"));
   if(!empty($idnd))
   {
      $sql = "select * from nguoidung where idnd = :idnd";
      $params = ["idnd"=>$idnd];
      $nguoidungs = Database::db_get_row($sql,$params);
      if ($nguoidungs['email'] == 'admin@gmail.com'){
       ?>
       <script language="javascript">
		    alert('Bạn không thể xóa Supper Admin được!');
		    window.location = '<?php echo Helper::input_value('redirect'); ?>';
	  </script> 
      }
    <?php
      }
      
   $sql = "delete from nguoidung where idnd = :idnd";
   $params = ["idnd"=>$idnd];
   if(Helper::is_submit("yes") && Database::db_execute($sql,$params))
   {
       Helper::redirect("./?c=listtv");
   }
}
?>
<h1 style='color:red;'>Cảnh báo!!!</h1>
<h1>Bạn có muốn xóa thành viên <?php echo "\" " . $nguoidungs["hoten"] . " \""; ?> này không ?</h1>
<form action="" method="post">
    <input type="hidden" name="action" value="yes">
    <input type="submit" value="Có" title="Có để tiếp tục" class="btn btn-danger col-sm-1">
    <a href="<?php echo Helper::get_url("Admincp/?c=listtv"); ?>" title="Không để trở lại" class="btn btn-success col-sm-1">Không</a>
</form>